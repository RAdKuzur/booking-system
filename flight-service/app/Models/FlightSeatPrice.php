<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlightSeatPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_seat_id',
        'date',
        'price',
    ];

    protected $casts = [
        'date' => 'date',
        'price' => 'float',
    ];

    /**
     * Получить связь с местом в рейсе
     */
    public function flightSeat(): BelongsTo
    {
        return $this->belongsTo(FlightSeat::class);
    }
}
