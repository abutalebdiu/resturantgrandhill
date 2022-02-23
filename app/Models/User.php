<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Artist\ArtistModelCategory;
use App\Models\Agency\AgencyCatagory;
use App\Models\Artist\ArtistParsonalInformation;
use App\Models\Role;
use App\Models\AgencyJob\AgencyJobPost;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'username',
        'first_name',
        'last_name',
        'mobile',
        'name',
        'email',
        'password',
        'role_id',
        'image',
        'status',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function ArtistModelCategory()
    {
        return $this->hasMany(ArtistModelCategory::class,'user_id');
    }

    public function agencycategory()
    {
        return $this->hasMany(AgencyCatagory::class,'user_id');
    }

    public function agencyjob()
    {
        return $this->hasMany(AgencyJobPost::class,'user_id');
    }





    public function userpersonalinfo()
    {
        return $this->hasMany(ArtistParsonalInformation::class,'user_id');
    }





    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }





    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }


     public function billing()
    {
        return $this->belongsTo(Billing::class,'id','user_id');
    }





}
