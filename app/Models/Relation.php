<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Relation extends Model
{
    use HasFactory;

    protected $table = [
      'relations'
    ];
    protected $fillable = [
        'owner_id',
        'tenant_id',
        'started_at',
    ];

    public function deal(): BelongsTo
    {
        return $this->belongsTo(Relation::class, 'rent_id', 'id');
    }
    public function owner(): HasOne
    {
        return $this->hasOne(User::class, 'owner_id', 'owner_id');
    }
    public function tenant(): HasOne
    {
        return $this->hasOne(User::class, 'tenant_id', 'tenant_id');
    }

}
