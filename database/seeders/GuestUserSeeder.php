<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class GuestUserSeeder extends Seeder
{
    public function run()
    {
        // Ha nem létezik a vendég, hozzuk létre automatikusan
        if (!User::where('email', 'guest@example.com')->exists()) {
            User::create([
                'name' => 'Vendég Felhasználó',
                'email' => 'guest@example.com',
                'password' => bcrypt('random_password_not_used'),
                'role' => 'user',
            ]);
        }
    }
}
