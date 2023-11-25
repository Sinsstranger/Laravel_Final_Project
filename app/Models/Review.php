<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Property;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'description',
      'rating',
      'author_id',
      'property_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function property(): BelongsTo
    {
       return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
