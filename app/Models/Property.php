<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price_per_day',
        'is_temporary_registration_possible',
        'address_id',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class,'address_id', 'id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }
}
