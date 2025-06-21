<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'license_plate',
        'transmission_type',
        'status',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
