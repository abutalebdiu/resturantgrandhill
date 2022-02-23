<?php

namespace App\Models;

use App\Models\Admin\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'room_id',
        'person',
        'booking_type',
        'checkin',
        'checkout',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'checkin' => 'string',
        'checkout' => 'string',
    ];

    protected $with = 'room';

    public function room()
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

}
