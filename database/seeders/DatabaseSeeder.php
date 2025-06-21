<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // 1. Master data & Users
            UserSeeder::class,          // Creates all user types (Admin, Instructor, Student)
            CarSeeder::class,           // Creates car data
            CoursePackageSeeder::class, // Creates course package data

            // 2. Transactions (Booking, Payment, Schedule are combined in BookingSeeder)
            BookingSeeder::class,       // Creates bookings, along with their payments and schedules

            // 3. Supporting data that depends on the above
            TestimonialSeeder::class,   // Creates testimonials from students for instructors
            BlogArticleSeeder::class,   // Creates articles written by admins
        ]);
    }
}