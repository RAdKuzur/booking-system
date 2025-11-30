<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelTicket extends Model
{
    use HasFactory;

    protected $table = 'hotel_tickets';

    protected $fillable = [
        'booking_id',
        'room_id',
        'tariff',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'room_id' => 'integer',
        'tariff' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Получить бронирование
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
