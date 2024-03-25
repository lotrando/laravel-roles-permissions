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
        $admin = new User([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        $admin->save();
        $admin->assignRole('admin');

        $supervisor = new User([
            'name' => 'Supervisor',
            'email' => 'supervisor@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('supervisor'),
            'remember_token' => Str::random(10),
        ]);

        $supervisor->save();
        $supervisor->assignRole('supervisor');

        $user = new User([
            'name' => 'User',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
            'remember_token' => Str::random(10),
        ]);

        $user->save();
        $user->assignRole('user');


        User::factory(47)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
