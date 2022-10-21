<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'initial_weight' => $this-> faker->randomElement([52,80,60,71,90,65,87,64,56,78]),
            'weight'=>$this->faker->numberBetween($min = 55 , $max = 85),
            'clients_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
        ];
    }
}
