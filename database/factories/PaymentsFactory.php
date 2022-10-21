<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rates_id'=>$this->faker->numberBetween($min = 1 , $max = 4),
            'clients_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'start_date'=>$this->faker->dateTime(),
            'finish_date'=>$this->faker->dateTime(),
        ];
    }
}
