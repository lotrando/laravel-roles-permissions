<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions

        $permissionsA = [
            'user create',
            'user edit',
            'user show',
            'user delete',

            'role create',
            'role edit',
            'role show',
            'role delete',

            'permission create',
            'permission edit',
            'permission show',
            'permission delete',

            'post create',
            'post edit',
            'post show',
            'post delete',
        ];

        $permissionsB = [
            'oznameni',
            'strava',
            'dokumentace',
            'standardy',
            'isp',
            'bozp',
            'kvalita',
            'media',
        ];

        foreach ($permissionsB as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
