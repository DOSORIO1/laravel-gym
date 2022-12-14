<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        return [
            'image'=> $faker->imageUrl(150, 150 ),
            'name' => $this-> faker->randomElement(['nike', 'adidas', 'puma']),
            'code' => $this-> faker->numberBetween($min = 001 , $max = 999),
            'amount'=>$this->faker->numberBetween($min = 14 , $max = 50),
            'price'=>$this->faker->numberBetween($min = 600000 , $max = 220000),
            'categories_id'=>$this->faker->numberBetween($min = 1 , $max = 3),
        ];
    }
}
