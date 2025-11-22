<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        if (!\App\Models\User::where('email', 'admin@admin.com')->exists()) {
    \App\Models\User::create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin123'),
        'role' => 'admin',
    ]);
}

    }
}
