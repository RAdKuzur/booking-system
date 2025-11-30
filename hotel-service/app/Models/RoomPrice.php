<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'room_id',
        'date',
    ];

    protected $casts = [
        'price' => 'integer',
        'date' => 'date',
    ];

    /**
     * Получить номер, к которому относится цена
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
