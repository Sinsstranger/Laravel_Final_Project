<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
      'country',
      'place',
      'street',
      'house_number',
      'flat_number',
    ];

    public function property(): HasOne
    {
        return $this->hasOne(Property::class, 'address_id', 'id');
    }
    public function createModel(array $data): Address
    {
        $address = Address::firstOrCreate([
            'country' => $data['country'],
            'place' => $data['place'],
            'street' => $data['street'] ,
            'house_number' => $data['house_number'],
            'flat_number' => isset($data['flat_number'])
        ]);
        $address->save();
        return $address;
    }
}
