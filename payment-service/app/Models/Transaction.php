<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'type',
        'card_number',
        'status',
        'payment_id'
    ];

    protected $casts = [
        'type' => 'integer',
        'status' => 'integer',
    ];
}
