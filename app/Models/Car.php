<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    
    const TRANSMISSION_MANUAL = 'manual';
    const TRANSMISSION_AUTOMATIC = 'automatic';

    const STATUS_AVAILABLE = 'available';
    const STATUS_IN_USE = 'in_use';
    const STATUS_MAINTENANCE = 'maintenance';

    public static function getTransmissionTypes(): array
    {
        return [
            self::TRANSMISSION_MANUAL => 'manual',
            self::TRANSMISSION_AUTOMATIC => 'automatic',
        ];
    }

    public static function getStatuses(): array
    {
        return [
            self::STATUS_AVAILABLE => 'available',
            self::STATUS_IN_USE => 'in_use',
            self::STATUS_MAINTENANCE => 'maintenance',
        ];
    }
    
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
