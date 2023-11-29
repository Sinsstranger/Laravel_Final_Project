<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deal extends Model
{
    use HasFactory;

    protected $table = 'deals';
    protected $fillable = [
        'property_id',
        'tenant_id',
        'guests',
        'rent_starts_at',
        'rent_ends_at',
        'rent_costs',
        'status_id',
        'registration'
    ];
    protected $casts = [
        'registration' => 'boolean'
    ];

    public function status(): BelongsTo
    {
        // return $this->belongsTo(DealStatus::class, 'status_id', 'status_id');
        return $this->belongsTo(DealStatus::class, 'status_id', 'id');
    }

    public function property(): BelongsTo
    {
         return $this->belongsTo(Property::class, 'property_id');
//
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function createModel(array $data): Deal
    {

        return $this::create([
            'property_id' => $data['property_id'],
            'tenant_id' => $data['tenant_id'],
            'rent_starts_at' => $data['rent_starts_at'],
            'rent_ends_at' => $data['rent_ends_at'],
            'rent_costs' => $data['rent_costs'],
            'guests' => $data['guests'],
            'status_id' => 1,
            'registration' => $data['registration']
        ]);

    }
    public function getDealsByUserId(int $user_id): Collection
    {
        return $this->query()->where('tenant_id', '=', $user_id)->get();
    }

    public function scopeStatus(Builder $query): void
    {
        if (request()->has('f')) {
            $query->where('status_id', request()->query('f', 'Выбрать статус'));
        }
    }
}
