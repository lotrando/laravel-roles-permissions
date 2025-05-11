<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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

        // Test User
        $user = User::create([
            'name' => 'User',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('useruser'),
        ]);

        $user->save();
        $user->assignRole('user');
        $user->givePermissionTo([
            //
        ]);

        // Testing users
        // User::factory(50)->create()->each(function ($user) {
        //     $user->assignRole('user')->givePermissionTo();
        // });
    }
}
