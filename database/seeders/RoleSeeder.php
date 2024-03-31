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

        // Sekretariat
        Role::create([
            'name' => 'sekretariat'
        ])->givePermissionTo([
            'oznameni',
            'dokumentace',
            'standardy',
            'isp',
            'kvalita',
        ]);

        // Kuchyne
        Role::create([
            'name' => 'kuchyn'
        ])->givePermissionTo([
            'oznameni',
            'strava',
        ]);

        // BOZP
        Role::create([
            'name' => 'bozp'
        ])->givePermissionTo([
            'oznameni',
            'bozp',
            'media'
        ]);

        // User
        Role::create([
            'name' => 'user'
        ])->givePermissionTo([
            'oznameni',
        ]);
    }
}
