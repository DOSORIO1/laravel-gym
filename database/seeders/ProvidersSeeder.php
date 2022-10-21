<?php

namespace Database\Seeders;

use App\Models\providers;
use Illuminate\Database\Seeder;

class ProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        providers::factory(10)->create();
    }
}
