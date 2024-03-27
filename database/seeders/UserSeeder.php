<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'remember_token' => Str::random(10),
        ]);

        $admin->save();
        $admin->assignRole('admin')->getAllPermissions();

        $supervisor = User::create([
            'name' => 'Supervisor User',
            'email' => 'supervisor@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('supervisor'),
            'remember_token' => Str::random(10),
        ]);

        $supervisor->save();
        $supervisor->assignRole('supervisor')->getAllPermissions();

        $user = User::create([
            'name' => 'Classic User',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
            'remember_token' => Str::random(10),
        ]);

        $user->save();
        $user->assignRole('user');

        $guest = User::create([
            'name' => 'Guest user',
            'email' => 'guest@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
            'remember_token' => Str::random(10),
        ]);

        $guest->save();
        $guest->assignRole('guest');


        // Testing users
        // User::factory(7)->create()->each(function ($user) {
        //     $user->assignRole('guest');
        // });
    }
}
