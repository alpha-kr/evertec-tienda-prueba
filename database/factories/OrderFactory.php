<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'request_id'=>$this->faker->randomNumber(3),
            'user_id'=>User::factory(),
            'customer_name'=>$this->faker->name(),
            'customer_email'=>$this->faker->email(),
            'customer_mobile'=>$this->faker->phoneNumber(),
            'comments'=>$this->faker->sentence(),
            'status'=> config('payment.states.initial'),
            'total'=>$this->faker->randomNumber(6)
        ];
    }
}
