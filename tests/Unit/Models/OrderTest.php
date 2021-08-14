<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase  ;

class OrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_order_has_many_details()
    {
        $this->assertInstanceOf(Collection::class,(new Order)->details);
    }
}
