<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rule extends Model
{
    use HasFactory;

    protected $table = 'rules';

    protected $fillable = [
        'name',
        'role_id',
        'path',
    ];

    /**
     * Получить роль, к которой принадлежит правило
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
