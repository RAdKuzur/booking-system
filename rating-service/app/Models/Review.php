<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'type',
        'object_id',
        'rating',
        'user_id',
        'comment',
    ];

    protected $casts = [
        'type' => 'integer',
        'object_id' => 'integer',
        'rating' => 'integer',
        'user_id' => 'integer',
    ];

}
