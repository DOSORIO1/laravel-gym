<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetailInvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sales_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'products_id'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'amount'=>$this->faker->numberBetween($min = 1 , $max = 20),
            'unit_value'=>$this->faker->numberBetween($min = 50000 , $max = 150000),
            'total'=>$this->faker->numberBetween($min = 500000 , $max = 1500100)
        ];
    }
}
