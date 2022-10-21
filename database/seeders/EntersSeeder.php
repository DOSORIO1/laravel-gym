<?php

namespace Database\Seeders;

use App\Models\enters;
use Illuminate\Database\Seeder;

class EntersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        enters::factory(3)->create();
    }
}
