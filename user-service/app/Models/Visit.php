<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'user_agent',
        'ip_address',
        'request_method',
        'request_time',
    ];

    protected $casts = [
        'request_time' => 'datetime',
    ];
}
