<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'All'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name' => 'RequestCreate'])->syncRoles([RoleEnum::ASSISTANT_LIBRARIAN]);
        Permission::create(['name' => 'CreateUpdateRequest'])->syncRoles([RoleEnum::LIBRARIAN]);
        Permission::create(['name' => 'Request'])->syncRoles([RoleEnum::MEMBER]);
    }
}
