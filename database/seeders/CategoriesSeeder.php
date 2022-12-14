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
        for ($i = 2; $i <= 5; $i++) {

            categories::insert([
                [
                    'name' => 'nike',
                    'companies_id' => $i,
                ],
                [
                    'name' => 'adidas',
                    'companies_id' => $i,
                ],
                [
                    'name' => 'puma',
                    'companies_id' => $i,
                ],
               
            ]);
        }
    }
}
