<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    const STATUS_AVAILABLE = 'available';
    const STATUS_BOOKED = 'booked';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_AVAILABLE => 'available',
            self::STATUS_BOOKED => 'booked',
        ];
    }

    protected $fillable = [
        'instructor_id',
        'booking_id',
        'car_id',
        'start_time',
        'end_time',
        'session_status',
        'instructor_notes',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
