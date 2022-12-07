<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        // doctor
        Permission::create(['name' => 'assign-mission']);
        Permission::create(['name' => 'add-patient']);
        Permission::create(['name' => 'add-comment']);
        Permission::create(['name' => 'reset-password']);
        // patient
        Permission::create(['name' => 'upload-video']);
        Permission::create(['name' => 'upload-record']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'doctor']);
        $role->givePermissionTo(['assign-mission', 'add-patient', 'add-comment', 'reset-password']);

        $role = Role::create(['name' => 'patient']);
        $role->givePermissionTo('upload-video', 'upload-record');
    }
}
