<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProvidersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'dni_type' => $this-> faker->randomElement(['Cedula de ciudadania ', 'Cedula extrangera']),
            'dni'=> $this->faker->ean8(),
            'address'=>$this->faker->address(),
            'phone_number'=>$this->faker->e164PhoneNumber(),
            'email' =>$this->faker->email()
        ];
    }
}
