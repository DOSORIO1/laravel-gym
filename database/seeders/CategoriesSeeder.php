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
        for ($i = 1; $i <= 5; $i++) {

            categories::insert([
                [
                    'name' => 'tenis nike',
                    'companies_id' => $i,
                ],
                [
                    'name' => 'busos adidas',
                    'companies_id' => $i,
                ],
                [
                    'name' => 'press de banca',
                    'companies_id' => $i,
                ],
               
            ]);
        }
    }
}
