<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealStatus extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'deal_statuses';

    protected $fillable = [
        'name'
    ];

    public function deal(): HasMany
    {
        return $this->hasMany(Deal::class, 'status_id', 'id');
    }
}
