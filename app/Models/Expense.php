<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'reference',
        'purpose',
        'remarks',
        'amount',
        'entry_by',
        'update_by',
    ];

    // protected $with = ['entryBy', 'updateBy'];

    // public function entryBy()
    // {
    //     return $this->belongsTo(User::class, 'entry_by');
    // }

    // public function updateBy()
    // {
    //     return $this->belongsTo(User::class, 'update_by');
    // }
}
