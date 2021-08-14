<?php

namespace Tests\Unit\Models;

use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class OrderDetailTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_belongs_to_order_detail()
    {
        $this->assertInstanceOf(Product::class, OrderDetails::factory()->create()->product);
    }
}
