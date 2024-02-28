<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\AddressesFactory;

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

    protected static function newFactory(): Factory
    {
        return AddressesFactory::new();
    }

    public function property(): HasOne
    {
        return $this->hasOne(Property::class, 'address_id', 'id');
    }

    public function createModel(array $data): \Illuminate\Database\Eloquent\Builder|Model
    {
        // Используй compact для создания массива значений
        $address = Address::query()->firstOrCreate([
            'country' => $data['country'],
            'place' => $data['place'],
            'street' => $data['street'] ,
            'house_number' => $data['house_number'],
            'flat_number' => isset($data['flat_number'])
        ]);

        $address->save(); // save() необязателен, так как firstOrCreate уже сохраняет модель
        return $address;
    }
}
