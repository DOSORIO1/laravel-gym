<?php

namespace Database\Seeders;

use App\Models\profiles;
use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        profiles::factory(20)->create();
    }
}
