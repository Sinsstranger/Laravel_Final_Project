<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function properties(): HasMany {
        return $this->hasMany(Property::class, 'category_id');
    }
    public function getAllCategories(): Collection
    {
        return Category::all();
    }
}
