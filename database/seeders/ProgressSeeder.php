<?php

namespace Database\Seeders;

use App\Models\progress;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        progress::factory(20)->create();
    }
}
