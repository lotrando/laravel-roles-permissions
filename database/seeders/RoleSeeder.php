<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin / full access to everything
        Role::create([
            'name' => 'admin'
        ])->givePermissionTo(Permission::all());

        // Editor
        Role::create([
            'name' => 'editor'
        ])->givePermissionTo([
            'create user',
            'delete user',
            'edit user',
            'show user',
        ]);

        // User
        Role::create([
            'name' => 'user'
        ])->givePermissionTo([
            'show permission',
            'show role',
            'show user'
        ]);
    }
}
