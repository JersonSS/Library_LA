<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name'=>'Bibliotecario'],
            ['name'=>'Bibliotecario Asistente'],
            ['name'=>'Bibliotecario en Prácticas']
        ];

        foreach($roles as $role){

            Role::create([
                'name'=> $role['name'],
            ]);
        }
    }
}
