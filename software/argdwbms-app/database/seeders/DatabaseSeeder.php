<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sensor;
use App\Models\User;
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

        for ($i = 0; $i < 1000; $i++) {
            Sensor::create([
                'temperature' => rand(0, 1000),
                'humidity' => rand(0, 1000),
            ]);
        }

        User::create([
            'name' => "Marvin Ramos",
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@0896'),
        ]);
    }
}
