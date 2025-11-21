<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        $this->call([
            AdminSeeder::class,
        ]);

        // F1 adatok
        $this->call([
            PilotaSeeder::class,
            GpSeeder::class,
            EredmenySeeder::class,
        ]);
    }
}
