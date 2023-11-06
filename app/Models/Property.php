<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'price_per_day',
        'address_id',
        'user_id',
    ];

    protected $casts = [
        'is_temporary_registration_possible' => 'boolean'
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

    public function createModel($data, User $user, $address = null): bool
    {
        $property = $this->firstOrCreate([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'price_per_day' => $data['price_per_day'],
            'address_id' => $address->id,
            'user_id' => $user->id,
            'is_temporary_registration_possible' => isset($data['is_temporary_registration_possible'])
        ]);
        return $property->save();
    }



}
