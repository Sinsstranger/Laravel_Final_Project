<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'category_id',
        'number_of_rooms',
        'number_of_guests',
        'description',
        'photo',
        'price_per_day',
        'address_id',
        'user_id',
        'is_temporary_registration_possible',
        'daily_rent',
    ];

    protected $casts = [
        'is_temporary_registration_possible' => 'boolean',
        'daily_rent' => 'boolean',
        'photo' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function deal(): HasMany
    {
        return $this->hasMany(Deal::class, 'property_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }

    public function getAllProperties(): Collection
    {
        return $this->all();
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'property_id', 'id');
    }

    public function createModel(array $data): bool
    {
        $property = $this->firstOrCreate([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'number_of_rooms' => $data['number_of_rooms'],
            'number_of_guests' => $data['number_of_guests'],
            'description' => $data['description'],
            'photo' => $data['photo'],
            'price_per_day' => $data['price_per_day'],
            'address_id' => $data['address_id'],
            'user_id' => $data['user_id'],
            'is_temporary_registration_possible' => $data['is_temporary_registration_possible'] ?? false,
            'daily_rent' => $data['daily_rent'] ?? false,
        ]);
        event(new \App\Events\DefineNewPropertyEvent($property));

        return $property->save();
    }

    public function updatePropertyModel(array $data, Property $property): bool
    {
        $property->fill($data);

        return $property->save();
    }

    public function deleteProperty(Property $property): bool
    {
        return $property->delete();
    }

    public function scopeCategory(Builder $query): void
    {
        if (request()->has('f')) {
            $query->where('title', request()->query('f', 'Выбрать категорию'));
        }
    }
}
