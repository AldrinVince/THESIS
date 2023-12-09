<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sensor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i = 0; $i < 2000; $i++) {
            Sensor::create([
                'temperature' => rand(0, 1000),
                'humidity' => rand(0, 1000),
                'electricity_consumption' => rand(0, 220),
                'electricity_ampere' => rand(0, 10),
                'created_at' => Carbon::now()->subDays(rand(1, 365))->addHours(rand(0, 23))->addMinutes(rand(0, 59))->addSeconds(rand(0, 59)),
            ]);
        }

        User::create([
            'name' => "Marvin Ramos",
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@0896'),
        ]);
    }
}
