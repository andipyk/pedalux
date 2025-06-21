<?php

namespace Database\Seeders;

use App\Models\CoursePackage;
use Illuminate\Database\Seeder;

class CoursePackageSeeder extends Seeder
{
    public function run(): void
    {
        CoursePackage::factory(5)->create(); // Creates 5 types of course packages
    }
}
