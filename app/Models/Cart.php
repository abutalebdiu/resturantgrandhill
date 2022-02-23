<?php

namespace App\Models;

use App\Models\Admin\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'cartId',
        'price',
        'payable_amount',
        'discount_price',
        'person',
    ];

    protected $with = 'room';

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
