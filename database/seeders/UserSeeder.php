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

        // User / Role User / Permissions [user show, post show, roles show, permission show]
        $supervisor = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('moderator'),
        ]);

        $supervisor->save();
        $supervisor->assignRole('moderator');
        $supervisor->givePermissionTo([
            'post create',
            'post show',
            'post edit'
        ]);

        // User / Role User / Permissions [user show, post show, roles show, permission show]
        $user = User::create([
            'name' => 'User',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
        ]);

        $user->save();
        $user->assignRole('user');
        $user->givePermissionTo([
            'post create',
            'post show'
        ]);

        // Guest / Role Guest / Permissions [user show]
        $guest = User::create([
            'name' => 'Guest',
            'email' => 'guest@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
        ]);

        $guest->save();
        $guest->assignRole('guest');
        $guest->givePermissionTo([
            'post show'
        ]);

        // Testing users
        // User::factory(100)->create()->each(function ($user) {
        //     $user->assignRole('guest')->givePermissionTo('_default');
        // });
    }
}
