<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'glenpaulchoco@yahoo.com'], // Unique check
            [
                'name' => 'Glen Paul D. Choco',
                'password' => Hash::make('terratails13'),
                'role' => 'admin',
            ]
        );
    }
}
