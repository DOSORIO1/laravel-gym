<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompaniesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'GYM KRONOS', 'GYM Formas', 'GYM   U R 2',
                'GYM SPARTA', 'GYM Body Stude', 'Olimpo', 'Arnold GYM ',
                'SQUASH', 'Maximo Esfuerzo','GYM 1 PRO', 'GYM 2 XT','GYM 00 2D','FITNNES'
            ]),
            'logo' => $this->faker->emoji(),
            'phone_number' => $this->faker->tollFreePhoneNumber(),
        ];
    }
}
