<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favourities extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'user_id'
    ];

    public function getFavourites(User $user, Property $property){

    }

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class , 'foreign_key');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'foreign_key');
    }

    public function createModel(array $data): bool
    {
        $favourites = $this->firstOrCreate([
            'property_id' => $data['property_id'],
            'user_id' => $data['user_id'],

        ]);
        return $favourites->save();
    }

    public function deleteFavourities(Favourities $favourities): bool
    {
        return $favourities->delete();
    }

}
