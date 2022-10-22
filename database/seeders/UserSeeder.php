<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(30)->create();
        User::insert([
            [
                'name' => 'Daniel Osorio',
                'email' => 'jhairdosorio@gmail.com',
                'password' => Hash::make('admin123'),
                'roles_id' => 1, //Super admin
                'companies_id' => 1 //Super admin
                
            ]
        ]);
    }
}
