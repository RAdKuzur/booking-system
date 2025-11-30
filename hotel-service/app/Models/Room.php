<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'hotel_id',
        'floor',
    ];

    protected $casts = [
        'type' => 'integer',
        'floor' => 'integer',
    ];

    /**
     * Получить отель номера
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Получить цены номера
     */
    public function roomPrices(): HasMany
    {
        return $this->hasMany(RoomPrice::class);
    }
}
