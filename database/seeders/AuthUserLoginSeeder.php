<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthUserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createUser('buyer', 'buyer@gmail.com', User::ROLE_BUYER);
        $this->createUser('supplier', 'supplier@gmail.com', User::ROLE_SUPPLIER);
        $this->createUser('admin', 'admin@gmail.com', User::ROLE_ADMIN);
    }

    private function createUser(string $name, string $email, string $role): void
    {
        if (!User::where('email', $email)->exists()) {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('Test@123'), // Change to a hashed password
            ]);
            $user->assignRole($role);
        }
    }
}