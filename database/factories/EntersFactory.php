<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this-> faker->randomElement(['zapatillas adidas', 'zapatillas puma', 'zapatillas nike']),
            'providers_id'=>$this->faker->numberBetween($min = 1 , $max = 10),
            'reference'=>$this->faker->numberBetween($min = 12302 , $max = 30432),
            'subtotal'=>$this->faker->ean8(),
            'iva'=>$this->faker->numberBetween($min = 19 , $max = 19),
            'total'=>$this->faker->ean8(),
            'date'=>$this->faker->dateTime(),
        ];
    }
}
