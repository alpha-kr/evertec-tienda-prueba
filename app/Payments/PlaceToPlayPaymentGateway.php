<?php

namespace App\Payments;

use App\Models\Order;
use Exception;
use App\Payments\PaymentGateway;

class PlaceToPlayPaymentGateway  implements PaymentGateway
{
    protected $gateway;
    public $response = null;

    public function __construct()
    {
        $this->gateway = new  \Dnetix\Redirection\PlacetoPay(config('payment.auth'));
    }

    public function request(array $data): self
    {
        $this->response = $this->gateway->request($data);
        return $this;
    }
    public function processUrl(): String
    {
        if (!$this->response)
            throw new Exception("response property is not initialized send request first", 1);
        if ($this->success())
            return $this->response->processUrl();
        return '';
    }

    public function message(): String
    {
        if (!$this->response)
            throw new Exception("response property is not initialized send request first", 1);

        return $this->response->status()->message();
    }

    public function success(): bool
    {
        if (!$this->response)
            throw new Exception("response property is not initialized send request first", 1);

        return $this->response->isSuccessful();
    }

    public function getStatusPayment($idReference): array
    {
        return  $this->gateway->query($idReference)->status()->toArray();
    }
    
    function getReferencePayment():int{
        if (!$this->response)
            throw new Exception("response property is not initialized send request first", 1);
        if($this->success())
            return $this->response->requestId();
        return null;
    }

    public function makePayment(Order $order):self
    {

        $request = [
            'payment' => [
                'reference' => $order->id,
                'description' => 'Testing payment',
                'amount' => [
                    'currency' => config('payment.currency'),
                    'total' => $order->total,
                ],
            ],
            'expiration' => date('c', strtotime('+15 minutes')),
            'returnUrl' => route('order.show', $order),
            'ipAddress' => request()->ip(),
            'userAgent' =>  request()->header('User-Agent'),
        ];
        $this->request($request);
        if ($this->success()) {
            $order->update([
                'request_id' => $this->getReferencePayment(),
                'url_payment' => $this->processUrl()
            ]);
        }        
        return $this;
    }
}
