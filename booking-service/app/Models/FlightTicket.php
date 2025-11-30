<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlightTicket extends Model
{
    use HasFactory;

    protected $table = 'flight_tickets';

    protected $fillable = [
        'booking_id',
        'flight_seat_id',
        'tariff',
        'date',
    ];

    protected $casts = [
        'flight_seat_id' => 'integer',
        'tariff' => 'integer',
        'date' => 'date',
    ];

    /**
     * Получить бронирование
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

}
