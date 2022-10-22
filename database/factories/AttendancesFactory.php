<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendancesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'time'=>$this->faker->time(),
            'date'=>$this->faker->date(),
            'clients_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
        ];
    }
}
