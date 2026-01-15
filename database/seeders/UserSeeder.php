<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::query()->delete();

        User::create([
            'name' => 'Demo User',
            'email' => 'demo@saas.test',
            'password' => Hash::make('password123'),
        ]);
    }
}
