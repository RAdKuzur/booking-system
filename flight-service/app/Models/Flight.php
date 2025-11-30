<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'plane_id',
        'departure_airport_id',
        'arrival_airport_id',
        'departure_time',
        'arrival_time',
    ];

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    /**
     * Получить самолет рейса
     */
    public function plane(): BelongsTo
    {
        return $this->belongsTo(Plane::class);
    }
    public function flightSeats(): HasMany
    {
        return $this->hasMany(FlightSeat::class);
    }
}
