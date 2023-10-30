<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_starts_at',
        'rent_ends_at',
        'rent_costs',
        'status_id',
        'property_id',
        'rent_id'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(DealStatus::class, 'status_id', 'status_id');
    }
    public function property(): HasMany
    {
        return $this->hasMany(Property::class, 'property_id', 'property_id');
    }
    public function rent(): HasMany
    {
        return $this->hasMany(Relation::class, 'rent_id', 'rent_id');
    }
}
