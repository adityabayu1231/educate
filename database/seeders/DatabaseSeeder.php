<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::factory()->create([
            'name' => 'siswa',
        ]);
        Role::factory()->create([
            'name' => 'guru',
        ]);
        Role::factory()->create([
            'name' => 'admin',
        ]);

        User::factory()->create([
            'fullname' => 'administrator',
            'email' => 'administrator@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
            'is_active' => true,
        ]);
    }
}
