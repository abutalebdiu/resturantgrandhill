<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Room;

class RoomFloor extends Model
{
    use HasFactory;

    protected $with = 'rooms';

    public function rooms()
    {
        return $this->hasMany(Room::class,'room_floor_id','id');
    }
}
