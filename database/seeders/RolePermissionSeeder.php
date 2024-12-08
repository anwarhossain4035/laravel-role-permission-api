<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $viewPermission = Permission::create(['name' => 'view']);
        $editPermission = Permission::create(['name' => 'edit']);

        $adminRole->syncPermissions([$viewPermission, $editPermission]);
        $userRole->syncPermissions([$viewPermission]);
    }
}