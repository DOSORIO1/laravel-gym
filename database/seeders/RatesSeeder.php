<?php

namespace Database\Seeders;

use App\Models\rates;
use Illuminate\Database\Seeder;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {

            rates::insert([
                [
                    'name' => 'Mensual',
                    'price' => 60000,
                    'companies_id' => $i,
                ],
                [
                    'name' => 'quinsenal',
                    'price' => 40000,
                    'companies_id' => $i,
                ],
                [
                    'name' => 'semanal',
                    'price' => 20000,
                    'companies_id' => $i,
                ],
                [
                    'name' => 'Diario',
                    'price' => 5000,
                    'companies_id' => $i,
                ],
            ]);
        }
    }
}
