<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'registration' => 'boolean',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(DealStatus::class, 'status_id', 'id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function createModel(array $data): Deal
    {
        // Используй create метод модели, чтобы уменьшить количество кода
        return $this::create(array_merge($data, ['status_id' => 1]));
    }

    public function getDealsByUserId(int $user_id): Collection
    {
        // Используй метод where вместо query()->where
        return $this->where('tenant_id', $user_id)->get();
    }

    public function scopeStatus(Builder $query): void
    {
        // Используй метод when для читаемости кода
        $query->when(request()->has('f'), function ($q) {
            $q->where('status_id', request()->query('f', 'Выбрать статус'));
        });
    }
}
