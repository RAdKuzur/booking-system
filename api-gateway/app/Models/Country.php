<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'name',
    ];

    /**
     * Получить города страны
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
    /**
     * Получить визы, где страна является первой
     */
    public function firstCountryVisas(): HasMany
    {
        return $this->hasMany(Visa::class, 'first_country_id');
    }

    /**
     * Получить визы, где страна является второй
     */
    public function secondCountryVisas(): HasMany
    {
        return $this->hasMany(Visa::class, 'second_country_id');
    }

    /**
     * Получить все визы, связанные со страной
     */
    public function allVisas()
    {
        return Visa::where('first_country_id', $this->id)
            ->orWhere('second_country_id', $this->id)
            ->get();
    }
}
