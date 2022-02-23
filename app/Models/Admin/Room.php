<?php

namespace App\Models\Admin;

use App\Models\BookingDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function bookings()
    {
        return $this->hasMany(BookingDetail::class, 'room_id');
    }
}
