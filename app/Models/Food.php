<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    public function foodcategory()
    {
        return $this->belongsTo(FoodCategory::class, 'food_category_id');
    }

    protected  $fillable = [
        'name',
        'food_category_id',
        'price',
        'image',
        'status',
    ];
    public static function foodByCatId($id)
    {
        return Food::where('food_category_id', $id)->get();
    }
}
