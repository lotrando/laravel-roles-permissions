<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
        ]);

        $admin->save();
        $admin->assignRole('admin');
        $admin->givePermissionTo([
            //
        ]);

        // Test sekretarka
        $supervisor = User::create([
            'name' => 'Wojnarova Marcela',
            'email' => 'wojnarova@khn.cz',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $supervisor->save();
        $supervisor->assignRole('sekretariat');
        $supervisor->givePermissionTo([
            'media'
        ]);

        // Test Kuchyne
        $user = User::create([
            'name' => 'Weber Martin',
            'email' => 'weber@khn.cz',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $user->save();
        $user->assignRole('kuchyn');
        $user->givePermissionTo([
            'oznameni'
        ]);

        // Test Admin
        $user = User::create([
            'name' => 'Klika Miroslav',
            'email' => 'klika@khn.cz',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $user->save();
        $user->assignRole('admin');
        $user->givePermissionTo([
            //
        ]);

        // Test User
        $user = User::create([
            'name' => 'Vanek Milan',
            'email' => 'vanek@khn.cz',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $user->save();
        $user->assignRole('user');
        $user->givePermissionTo([
            //
        ]);

        // Testing users
        // User::factory(100)->create()->each(function ($user) {
        //     $user->assignRole('guest')->givePermissionTo('_default');
        // });
    }
}
