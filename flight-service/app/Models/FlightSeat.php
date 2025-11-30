<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FlightSeat extends Model
{
    use HasFactory;

    protected $table = 'flight_seats';

    protected $fillable = [
        'flight_id',
        'seat_id',
    ];

    /**
     * Получить рейс
     */
    public function flight(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }

    /**
     * Получить место
     */
    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }

    /**
     * Получить цены места
     */
    public function prices(): HasMany
    {
        return $this->hasMany(FlightSeatPrice::class);
    }

}
