<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'checkin',
        'checkout',
        'vat',
        'tax',
        'total_price',
        'after_discount',
        'booking_type',
        'original_amount',
        'paid_amount',
        'still_dues',
        'payment_method',
        'status',
    ];

    protected $with = ['bookingDetail', 'billinginfo'];

    public function bookingDetail()
    {
        return $this->hasMany(BookingDetail::class);
    }

    public function billinginfo()
    {
        return $this->hasOne(Billing::class);
    }

}
