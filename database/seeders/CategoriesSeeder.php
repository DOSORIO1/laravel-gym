<?php

namespace Database\Seeders;

use App\Models\categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {

            categories::insert([
                [
                    'name' => 'nike',
                    'description' => 'zapatillas deportivas',
                    'companies_id' => $i,
                ],
                [
                    'name' => 'adidas',
                    'description' => 'zapatillas para deporte',
                    'companies_id' => $i,
                ],
                [
                    'name' => 'puma',
                    'description' => 'deportivas',
                    'companies_id' => $i,
                ],
               
            ]);
        }
    }
}
