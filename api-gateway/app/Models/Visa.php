<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visa extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_country_id',
        'second_country_id',
        'rule',
    ];

    /**
     * Получить первую страну визового правила
     */
    public function firstCountry(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'first_country_id');
    }

    /**
     * Получить вторую страну визового правила
     */
    public function secondCountry(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'second_country_id');
    }

    /**
     * Проверить, требуется ли виза между двумя странами
     */
    public static function getVisaRule($firstCountryId, $secondCountryId): ?string
    {
        $visa = self::where('first_country_id', $firstCountryId)
            ->where('second_country_id', $secondCountryId)
            ->first();

        return $visa ? $visa->rule : null;
    }

    /**
     * Получить описание визового правила
     */
    public function getRuleDescriptionAttribute(): string
    {
        return "Для граждан {$this->firstCountry->name} при поездке в {$this->secondCountry->name}: {$this->rule}";
    }
}
