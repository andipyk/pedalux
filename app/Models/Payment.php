<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_PAID = 'paid';
    const STATUS_FAILED = 'failed';
    const STATUS_REFUNDED = 'refunded';

    const METHOD_CASH = 'cash';
    const METHOD_TRANSFER = 'transfer';
    const METHOD_CREDIT_CARD = 'credit_card';
    const METHOD_DEBIT_CARD = 'debit_card';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_PENDING => 'pending',
            self::STATUS_PAID => 'paid',
            self::STATUS_FAILED => 'failed',
            self::STATUS_REFUNDED => 'refunded',
        ];
    }

    public static function getMethods(): array
    {
        return [
            self::METHOD_CASH => 'cash',
            self::METHOD_TRANSFER => 'transfer',
            self::METHOD_CREDIT_CARD => 'credit_card',
            self::METHOD_DEBIT_CARD => 'debit_card',
        ];
    }

    protected $fillable = [
        'booking_id',
        'payment_method',
        'payment_status',
        'payment_timestamp',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
