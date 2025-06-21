<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Instructor;
use App\Models\Student;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create 1 Admin Account
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        Admin::factory()->create(['user_id' => $admin->id]);

        // 2. Create 5 Instructor Accounts
        User::factory(5)->create(['role' => 'instructor'])->each(function ($user) {
            Instructor::factory()->create(['user_id' => $user->id]);
        });

        // 3. Create 20 Student Accounts
        User::factory(20)->create(['role' => 'student'])->each(function ($user) {
            Student::factory()->create(['user_id' => $user->id]);
        });
    }
}
