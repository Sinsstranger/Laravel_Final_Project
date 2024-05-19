<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        // Уточни внешний ключ, чтобы избежать его автоматического определения
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property(): BelongsTo
    {
        // Уточни внешний ключ, чтобы избежать его автоматического определения
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function createModel($property_id, $user_id): bool
    {
        // Используй метод create для создания и сохранения записи
        return $this->create([
            'property_id' => $property_id,
            'user_id' => $user_id,
        ]);
    }

    public function deleteFavourite(Favourite $favourite): bool
    {
        // Используй метод delete для удаления записи
        return $favourite->delete();
    }

    // Если ты планируешь использовать метод getFavourites, уточни его логику
    public function getFavourites(User $user, Property $property)
    {
        // Логика получения избранных
    }
}
