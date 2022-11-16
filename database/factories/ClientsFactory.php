<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name'=>$this->faker->name(),
            'age'=>$this->faker->numberBetween($min = 14 , $max = 50),
            'weight'=>$this->faker->numberBetween($min = 50 , $max = 120),
            'fingerprint'=>$this->faker->sha256(),
            // 'email'=>$this->faker->freeEmail(),
            'nivel' => $this-> faker->randomElement(['principiante', 'avanzado', 'experto']),
            'injures' => $this-> faker->randomElement(['si', 'no', 'recuperado']),
            'users_id'=>$this->faker->numberBetween($min = 2 , $max = 20),
        ];
    }
}
