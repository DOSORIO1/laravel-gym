<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this-> faker->dateTime(),
            'photo'=>$this->faker->imageUrl($width = 640, $height = 480),
            'clients_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
        ];
    }
}
