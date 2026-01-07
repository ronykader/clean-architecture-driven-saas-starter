<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Eloquent\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::query()->delete();

        Plan::create([
            'name' => 'Basic',
            'slug' => 'basic',
            'price' => 1000,
            'currency' => 'usd',
            'is_active' => true,
        ]);

        Plan::create([
            'name' => 'Pro',
            'slug' => 'pro',
            'price' => 2500,
            'currency' => 'usd',
            'is_active' => true,
        ]);

        Plan::create([
            'name' => 'Enterprise',
            'slug' => 'enterprise',
            'price' => 5000,
            'currency' => 'usd',
            'is_active' => false,
        ]);
    }
}
