<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aircraft extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seats',
    ];

    protected $casts = [
        'seats' => 'integer',
    ];

    /**
     * Получить самолеты этой модели
     */
    public function planes(): HasMany
    {
        return $this->hasMany(Plane::class);
    }

}
