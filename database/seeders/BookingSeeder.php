<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\CoursePackage;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Instructor;
use App\Models\Car;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $packages = CoursePackage::all();
        $instructors = Instructor::all();
        $cars = Car::where('status', 'Available')->get();

        foreach ($students as $student) {
            // Assume each student makes one booking
            $selectedPackage = $packages->random();
            
            $booking = Booking::factory()->create([
                'student_id' => $student->id,
                'course_package_id' => $selectedPackage->id,
                'total_amount' => $selectedPackage->price,
            ]);

            // Directly create one Payment record for each booking
            Payment::factory()->create(['booking_id' => $booking->id]);

            // Create schedules according to the number of sessions in the package
            for ($i = 0; $i < $selectedPackage->number_of_sessions; $i++) {
                Schedule::factory()->create([
                    'booking_id' => $booking->id,
                    'instructor_id' => $instructors->random()->id,
                    'car_id' => $cars->random()->id,
                ]);
            }
        }
    }
}
