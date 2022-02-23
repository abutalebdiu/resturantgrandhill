<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected  $fillable = ['id','image','title','title_ar','slug','category_id','description','description_ar','publish_date','status','is_admin'];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'is_admin');
    }
}
