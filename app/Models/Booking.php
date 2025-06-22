<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    const STATUS_PENDING_PAYMENT = 'pending_payment';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_CANCELLED = 'cancelled';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_PENDING_PAYMENT => 'pending_payment',
            self::STATUS_CONFIRMED => 'confirmed',
            self::STATUS_CANCELLED => 'cancelled',
        ];
    }

    protected $fillable = [
        'student_id',
        'course_package_id',
        'booking_date',
        'total_amount',
        'booking_status',
    ];

    public function schedules()
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

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }
}
