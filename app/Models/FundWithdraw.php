<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundWithdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'available_amount',
        'withdraw_amount',
        'payment_mode',
        'remarks',
        'entry_by',
        'update_by',
    ];
}
