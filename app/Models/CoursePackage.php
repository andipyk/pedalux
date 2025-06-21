<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'description',
        'price',
        'total_hours',
        'number_of_sessions',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
