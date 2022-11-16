<?php

namespace Database\Seeders;

use App\Models\payments;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        payments::factory(1000)->create();
    }
}
