<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Instructor;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::has('bookings')->get(); // Only students who have made bookings
        $instructors = Instructor::all();

        if ($students->isEmpty() || $instructors->isEmpty()) {
            return; // Do not run if there are no students or instructors
        }

        // Create 15 testimonials
        for ($i = 0; $i < 15; $i++) {
            Testimonial::factory()->create([
                'student_id' => $students->random()->id,
                'instructor_id' => $instructors->random()->id,
            ]);
        }
    }
}
