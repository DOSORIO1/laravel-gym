<?php

namespace Database\Seeders;

use App\Models\detailEnters;
use Illuminate\Database\Seeder;

class DetailEntersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        detailEnters::factory(3)->create();
    }
}
