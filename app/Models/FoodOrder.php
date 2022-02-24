<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function items()
    {
        return $this->hasMany(FoodOrderItem::class, 'food_id');
    }
}
