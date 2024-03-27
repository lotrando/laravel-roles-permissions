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
        // Administrator
        Role::create([
            'name' => 'admin'
        ])->givePermissionTo(Permission::all());

        // Supervisor
        Role::create([
            'name' => 'supervisor'
        ])->givePermissionTo([
            'user show',
            'user create',
            'user edit',
        ]);

        // Classic user
        Role::create([
            'name' => 'user'
        ])->givePermissionTo([
            'user show',
            'user edit',
        ]);

        // Guest user
        Role::create([
            'name' => 'guest'
        ])->givePermissionTo([
            'user show',
        ]);;
    }
}
