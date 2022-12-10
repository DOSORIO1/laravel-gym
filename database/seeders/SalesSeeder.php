<?php

namespace Database\Seeders;

use App\Models\sales;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sales::factory(100)->create();
    }
}
