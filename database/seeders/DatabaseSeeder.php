<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $this->call([
            
            RolesSeeder::class,
            CompaniesSeeder::class,
            ProvidersSeeder::class,
            CategoriesSeeder::class,  
            EntersSeeder::class,
            RatesSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            ClientsSeeder::class,
            ProductsSeeder::class,  
            SalesSeeder::class,    
            PaymentsSeeder::class,           
            AttendancesSeeder::class,
            ProgressSeeder::class,
            ProfilesSeeder::class,  
            DetailInvoiceSeeder::class,                
            DetailEntersSeeder::class, 
           
        
        ]);        
    }
}
