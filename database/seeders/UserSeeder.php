<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $username = env('ACCESS_USER_NAME');
        $password = env('ACCESS_USER_PASSWORD');

        User::firstOrCreate([
            'name' => $username,
            'password' => Hash::make($password)
        ]);
    }
}
