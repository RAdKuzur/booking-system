<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    protected $fillable = [
        'name',
        'address',
        'city_id',
        'stars',
    ];

    protected $casts = [
        'stars' => 'integer',
    ];

    /**
     * Получить номера отеля
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
