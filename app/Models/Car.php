<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
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
