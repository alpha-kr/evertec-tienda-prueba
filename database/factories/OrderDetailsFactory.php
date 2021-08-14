<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>Product::factory(),
            'quantity'=>$this->faker->randomNumber(2),
            'order_id'=>Order::factory(),
            'price'=>$this->faker->randomNumber(4),
        ];
    }
}
