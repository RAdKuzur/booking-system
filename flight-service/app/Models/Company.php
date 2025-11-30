<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Получить самолеты компании
     */
    public function planes(): HasMany
    {
        return $this->hasMany(Plane::class);
    }
}
