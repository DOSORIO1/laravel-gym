<?php

namespace Database\Seeders;

use App\Models\clients;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        //Creamos clientes id 11 al 40
        for ($i = 11; $i <= 40; $i++) {
            clients::create([
                'dni' => $faker->numberBetween($min = 9999999, $max = 99999999),
                'age' => $faker->numberBetween($min = 14, $max = 50),
                'weight' => $faker->numberBetween($min = 50, $max = 120),
                'fingerprint' => $faker->sha256(),
                'nivel' => $faker->randomElement(['principiante', 'avanzado', 'experto']),
                'injures' => $faker->randomElement(['si', 'no', 'recuperado']),
                'users_id' => $i,
            ]);
        }
    }
}
