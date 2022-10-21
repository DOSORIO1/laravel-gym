<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this-> faker->randomElement(['nike', 'adidas', 'puma']),
            'code' => $this-> faker->md5(),
            'amount'=>$this->faker->numberBetween($min = 14 , $max = 50),
            'price'=>$this->faker->numberBetween($min = 600000 , $max = 220000),
            'categories_id'=>$this->faker->numberBetween($min = 1 , $max = 3),
        ];
    }
}
