<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerStatement extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'remarks',
        'debit',
        'credit',
        'reference',
        'mobile',
        'payment_mode',
        'amount',
    ];

    public function bookings()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
