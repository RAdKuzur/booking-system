<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plane extends Model
{
    use HasFactory;

    protected $table = 'planes';

    protected $fillable = [
        'company_id',
        'aircraft_id',
        'serial_number',
    ];

    /**
     * Получить компанию самолета
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Получить модель самолета
     */
    public function aircraft(): BelongsTo
    {
        return $this->belongsTo(Aircraft::class);
    }

    /**
     * Получить места в самолете
     */
    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }

    /**
     * Получить рейсы самолета
     */
    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class);
    }

}
