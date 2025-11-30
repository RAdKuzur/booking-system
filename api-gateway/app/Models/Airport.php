<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'code',
    ];

    /**
     * Получить город аэропорта
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Получить страну аэропорта через город
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'city.country_id');
    }

    /**
     * Получить полное местоположение аэропорта
     */
    public function getFullLocationAttribute(): string
    {
        return "{$this->name} ({$this->code}), {$this->city->name}, {$this->city->country->name}";
    }
}
