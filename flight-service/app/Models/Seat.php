<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seat extends Model
{
    use HasFactory;

    protected $table = 'seats';

    protected $fillable = [
        'plane_id',
        'number',
        'type',
    ];

    protected $casts = [
        'number' => 'integer',
        'type' => 'integer',
    ];

    /**
     * Получить самолет, к которому относится место
     */
    public function plane(): BelongsTo
    {
        return $this->belongsTo(Plane::class);
    }

    /**
     * Получить связи с рейсами
     */
    public function flightSeats(): HasMany
    {
        return $this->hasMany(FlightSeat::class);
    }
}
