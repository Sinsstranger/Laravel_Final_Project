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

    protected $table = 'deals';
    protected $fillable = [
        'property_id',
        'tenant_id',
        'rent_starts_at',
        'rent_ends_at',
        'rent_costs',
        'status_id',
    ];

    public function status(): BelongsTo
    {
        // return $this->belongsTo(DealStatus::class, 'status_id', 'status_id');
        return $this->belongsTo(DealStatus::class, 'status_id', 'id');
    }

    public function property(): BelongsTo
    {
        // return $this->belongsTo(Property::class, 'property_id', 'id');
        return $this->belongsTo(Property::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
