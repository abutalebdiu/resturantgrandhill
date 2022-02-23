<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerStatement extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'booking_id',
=======
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
        'remarks',
        'debit',
        'credit',
        'reference',
        'mobile',
        'payment_mode',
        'amount',
    ];
<<<<<<< HEAD

    public function bookings()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
=======
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
}
