<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Payments\PaymentGateway;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function __construct(PaymentGateway $PaymentGateway)
    {
        $this->authorizeResource(Order::class);
        $this->gateway = $PaymentGateway;
    }

    public function index(Request $request)
    {
        $orders =  $request->user()->orders()->get();
        return Inertia::render('Orders', compact('orders'));
    }

    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        $products = $this->getPorducts($request->get('cart'));
        $order = Order::create([
            'customer_email' => $request->user()->email,
            'customer_name' => $request->user()->name,
            'customer_mobile' => $request->user()->phone,
            'status' => config('payment.states.initial'),
            'comments' => $request->get('comments'),
            'user_id' => $request->user()->id,
            'total' => $this->getTotal($products)
        ]);
        $order->details()->createMany($products);
        if ($this->gateway->makePayment($order)->success()) {
            DB::commit();
            session()->flash('redirected',  true);
            return  Inertia::location($this->gateway->processUrl());
        }
        Log::error($this->gateway->message());
        session()->flash('error_payment',  $this->gateway->message() . '.');
        DB::rollBack();
        return  redirect()->back();
    }

    public function show(Order $order, Request $request)
    {
        if (in_array($order->status,[config('payment.states.initial'),config('payment.states.restart')] )) {
            $response = $this->gateway->getStatusPayment($order->request_id);
            if (in_array($response['status'], array_keys(config('payment.states.gateway')))) {
                session()->flash('payment_response', $response['message']);
                $order->status = config('payment.states.gateway')[$response['status']];
                $order->save();
            } else {
                session()->flash('error_payment', 'Error al intentar hacer el pago Intente mas tarde');
            }
        }
        $order->load('details.product');

        return Inertia::render('Order', compact('order'));
    }

    protected function getPorducts(array $products)
    {
        $quantities = collect($products)->pluck('quantity', 'id');

        return Product::select('id as product_id', 'price')
            ->whereIn('id', array_column($products, 'id'))
            ->get()
            ->each(function ($item) use ($quantities) {
                $item->quantity = $quantities[$item->product_id];
                return $item;
            })->toArray();
    }

    public function reTryPayment(Order $order)
    {
        if ($order->status!=config('payment.states.restart')) {
            abort(401);
        }
        if ($this->gateway->makePayment($order)->success()) {
            return  Inertia::location($this->gateway->processUrl());
        }
        Log::error($this->gateway->message());
        session()->flash('payment_response',  $this->gateway->message() . '.');
        return  redirect()->back();
    }

    public function getTotal(array $products)
    {
        return  array_reduce($products, fn ($carry, $item) => $carry + $item['price'] * $item['quantity'], 0);
    }
}
