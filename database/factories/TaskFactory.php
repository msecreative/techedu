<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = [100, 200, 500, 700, 1000, 1500, 2000];
        $status = ['complete', 'pending'];
        $name = $this->faker->sentence();
        return [
           'name'           => $name,
           'slug'           => Str::slug($name),
           'description'    => $this->faker->sentences(rand(2,5), true),
           'price'          => $price[rand(0,6)],
           'status'          => $status[rand(0,1)],
           'client_id'      => Client::all()->random()->id,
           'user_id'        => User::all()->random()->id
        ];
    }
}
