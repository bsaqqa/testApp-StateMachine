<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderServices;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderServicesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderServices::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_id'  => Service::factory()->create()->id,
            'order_id'   => Order::factory()->create()->id,
            'price'     => round($this->faker->randomFloat(), 2)
        ];
    }
}
