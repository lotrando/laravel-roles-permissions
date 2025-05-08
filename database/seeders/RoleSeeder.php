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

        // User
        Role::create([
            'name' => 'user'
        ])->givePermissionTo([
            'user show',
        ]);
    }
}
