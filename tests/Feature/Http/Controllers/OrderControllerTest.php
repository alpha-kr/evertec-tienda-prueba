<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_guests_can_not_see_orders()
    {
        $this
            ->get('/order')
            ->assertRedirect('login');
    }

    public function test_guests_can_not_make_orders()
    {
        $this
            ->post('/order')
            ->assertRedirect('login');
    }

    public function test_show_policy_order()
    {
        $user=User::factory()->create(); 
        $order=Order::factory()->create();
        $this
            ->actingAs($user)
            ->get("order/$order->id")
            ->assertStatus(403);
    }

    public function test_store_order()
    {
        $user=User::factory()->create();
        
        $products=Product::factory()->count(2)->create([
            'price'=>5000
        ])->each(function($item){
            $item->quantity=1;
        })->toArray(); 

        $order=[
            'customer_email' =>$user->email,
            'customer_name' =>$user->name,
            'customer_mobile' =>$user->phone,
            'status' => 'CREATED',
            'comments' => 'dummy comment',
            'user_id' =>$user->id,
            'total' => 10000
        ];

        $this
            ->actingAs($user)
            ->post("order", [
                'comments' =>$order['comments'],
                'cart'=>$products
            ])
            ->assertStatus(409);//redirect to payment gateway url

        $this->assertDatabaseHas('orders',$order);
    }
}
