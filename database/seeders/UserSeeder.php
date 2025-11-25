<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Pehle role ensure karo ke exist karta ho
        $role = Role::firstOrCreate(['name' => 'Super Admin']);

        // User create karo
        $user = User::firstOrCreate(
            ['email' => 'muhammadmanamil@gmail.com'], // unique field
            [
                'name'        => 'Muhammad Manamil',
                'email'       => 'muhammadmanamil@gmail.com',
                'phone'       => '03117150328',
                'password'    => Hash::make('12341234'),
                'cnic'        => '33400106383289',
                'designation' => 'Super Admin',
                'username'    => 'manamil',
            ]
        );

        // Role assign karo
        $user->assignRole($role);
    }
}
