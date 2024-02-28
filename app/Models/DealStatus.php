<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'deal_statuses';

    protected $fillable = [
        'name',
    ];

    public function deals(): HasMany
    {
        // Используй короткий синтаксис для указания внешнего ключа и ключа связи
        return $this->hasMany(Deal::class);
    }
}
