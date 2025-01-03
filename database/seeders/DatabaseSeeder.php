<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Spotify;
use Illuminate\Database\Seeder;

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
        //

        Spotify::create([
            "link" => "4A7AeJub92JSRDIpaXJTeR",
        ]);

        Spotify::create([
            "link" => "0383ZXseCieN99WDVOX48c",
        ]);

        // Spotify::create([
        //     "link" => "4A7AeJub92JSRDIpaXJTeR",
        // ]);
    }
}
