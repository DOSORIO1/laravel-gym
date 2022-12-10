<?php

namespace Database\Seeders;

use App\Models\detailInvoice;
use Illuminate\Database\Seeder;

class DetailInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        detailInvoice::factory(100)->create();
    }
}
