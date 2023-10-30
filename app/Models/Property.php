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
        'category',
        'description',
        'price_per_day',
        'address_id',
        'user_id',
        'is_temporary_registration_possible',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }



    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class,'address_id', 'address_id');
    }

    public function deal(): BelongsTo
    {
        return $this->belongsTo(Deal::class, 'property_id', 'id');
    }
}
