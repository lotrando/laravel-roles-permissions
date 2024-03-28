<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Administrator / all permissions
        Role::create([
            'name' => 'admin'
        ])->givePermissionTo(Permission::all());

        // Supervisor
        Role::create([
            'name' => 'moderator'
        ])->givePermissionTo([
            'user create',
            'user edit',
            'user show',
            'role create',
            'role edit',
            'role show',
            'permission create',
            'permission edit',
            'permission show',
        ]);

        // User
        Role::create([
            'name' => 'user'
        ])->givePermissionTo([
            'user show',
            'role show',
            'permission show'
        ]);

        // Guest
        Role::create([
            'name' => 'guest'
        ])->givePermissionTo([
            'user show',
        ]);
    }
}
