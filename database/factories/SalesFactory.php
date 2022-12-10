<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id'=>$this->faker->numberBetween($min = 2 , $max = 30),
            'local_sale'=>$this->faker->boolean(),
            'reference'=>$this->faker->numberBetween($min = 12302 , $max = 30432),
            'subtotal'=>$this->faker->ean8(),
            'iva'=>$this->faker->numberBetween($min = 19 , $max = 19),
            'total'=>$this->faker->ean8(),
            'date'=>$this->faker->dateTime(),
        ];
    }
}
