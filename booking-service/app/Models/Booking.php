<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'firstname',
        'surname',
        'patronymic',
        'passport',
        'citizenship_id',
        'birthdate',
        'booking_date',
        'booking_expires_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'citizenship_id' => 'integer',
        'birthdate' => 'date',
        'booking_date' => 'datetime',
        'booking_expires_at' => 'datetime',
    ];

}
