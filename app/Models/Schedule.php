<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

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
