<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this-> faker->randomElement(['implementos deportivos', 'suplementos alimenticios', 'equipos']),
            'companies_id'=>$this->faker->numberBetween($min = 2 , $max = 10),
            
        ];
    }
}
