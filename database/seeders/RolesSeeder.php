<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        roles::insert([
            [
                //id: 1
                'name' => 'Super admin',
                'code' => 'SA',
                'description' => 'Usuario con todos los privilegios, puede crear empresas y administradores',
                'active' => true,
            ],
            [
                //id: 2
                'name' => 'Admin',
                'code' => 'A',
                'description' => 'Usuarios con privilegios en la empresa, puede crear empleados y clientes, ver las ventas y administrar la empresa',
                'active' => true,
            ],
            [
                //id: 3
                'name' => 'Employe',
                'code' => 'E',
                'description' => 'Usuario que administra el punto de venta, registra los pagos y crea clientes, toma la asistencia de los clientes',
                'active' => true,
            ],
            
        ]);
    }
}
