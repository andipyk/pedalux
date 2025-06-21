<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_package_id',
        'booking_date',
        'total_amount',
        'booking_status',
    ];

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function coursePackage()
    {
        return $this->belongsTo(CoursePackage::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
