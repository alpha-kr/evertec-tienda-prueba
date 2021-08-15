<?php

namespace Tests\Unit\Models;


use App\Models\OrderAdmin;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase  ;

class OrderAdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_order_admin_has_many_details()
    {
        $this->assertInstanceOf(Collection::class,(new OrderAdmin())->details);
    }
}
