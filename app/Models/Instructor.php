<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'qualification',
        'specialization',
        'average_rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }   
}
