<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id_one',
        'user_id_two',
        'text',
    ];

    protected $casts = [
        'text' => 'array',
    ];


}
