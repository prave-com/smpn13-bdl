<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@smpn13-bdl.sch.id',
            'password' => Hash::make(env('APP_KEY')),
            'email_verified_at' => now(),
        ]);
    }
}
