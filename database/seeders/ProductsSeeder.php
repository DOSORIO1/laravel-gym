<?php

namespace Database\Seeders;

use App\Models\products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        products::factory(100)->create();
    }
}
