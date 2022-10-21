<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                [
                    'name' => "admin empresa 2",
                    'email' => 'admin@empresa2.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 2
                ],
                [
                    'name' => "admin empresa 3",
                    'email' => 'admin@empresa3.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 3
                ],
                [
                    'name' => "admin empresa 4",
                    'email' => 'admin@empresa4.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 4
                ],
                [
                    'name' => "admin empresa 5",
                    'email' => 'admin@empresa5.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 5
                ],
                [
                    'name' => "admin empresa 6",
                    'email' => 'admin@empresa6.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 6
                ],
                [
                    'name' => "admin empresa 7",
                    'email' => 'admin@empresa7.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 7
                ],
                [
                    'name' => "admin empresa 8",
                    'email' => 'admin@empresa8.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 8
                ],
                [
                    'name' => "admin empresa 9",
                    'email' => 'admin@empresa9.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 9
                ],
                [
                    'name' => "admin empresa 10",
                    'email' => 'admin@empresa10.com',
                    'roles_id' => 2, //Admin
                    'password' => Hash::make('admin123'),
                    'companies_id' => 10
                ],
            ]
        );
    }
}
