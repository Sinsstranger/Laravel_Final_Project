<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
    ];

    public function user(): BelongsTo
    {
        // Уточни внешний ключ, чтобы избежать его автоматического определения
        return $this->belongsTo(User::class, 'user_id');
    }
}
