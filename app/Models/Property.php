<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Property extends Model
{
    use HasFactory;

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
        'daily_rent'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class,'address_id', 'id');
    }

    public function deal(): BelongsTo
    {
        return $this->belongsTo(Deal::class, 'property_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }





}
