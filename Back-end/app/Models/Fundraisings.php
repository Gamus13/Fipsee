<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraising extends Model
{
    use HasFactory;

    protected $fillable = [
        'target_amount',
        'amount_raised',
        'payment_count',
    ];
}
