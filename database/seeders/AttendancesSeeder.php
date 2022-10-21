<?php

namespace Database\Seeders;


use App\Models\attendances;
use Illuminate\Database\Seeder;

class AttendancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        attendances::factory(1000)->create();
    }
}
