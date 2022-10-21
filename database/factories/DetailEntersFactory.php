<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetailEntersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'enters_id'=>$this->faker->numberBetween($min = 1 , $max = 4),
            'products_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'amount'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'price_unitario'=>$this->faker->numberBetween($min = 50000 , $max = 150000),
            'total'=>$this->faker->numberBetween($min = 1000000, $max =2000000 ),
        ];
    }
}
