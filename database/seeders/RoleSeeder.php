<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //auto fill of roles table with roles defined by me
        $roles = ['Administrador', 'Usuario'];

        foreach($roles as $role){
            DB::table('roles')->insert([
                'name' => $role,
                'institution' => 'UNACH'
            ]);
        }
    }
}
