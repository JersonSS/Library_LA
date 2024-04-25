<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach(RoleEnum::cases() as $role)
        {

            Role::create(['name' => $role]);

        }


        /*
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Member']);
        Role::create(['name' => 'administration']);

        // todavia no seed
        Role::create(['name'=> 'Librarian']);
        Role::create(['name'=> 'Assistant Librarian']);
        */

    }
}
