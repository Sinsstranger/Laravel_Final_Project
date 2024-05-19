<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'avatar',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function properties(): HasMany
    {
        // Уточни внешний ключ, чтобы избежать его автоматического определения
        return $this->hasMany(Property::class, 'user_id');
    }

    public function reviews(): HasMany
    {
        // Уточни внешний ключ и ключ связи, чтобы избежать автоматического определения
        return $this->hasMany(Review::class, 'author_id');
    }

    public function getUserModel(int $user_id): User
    {
        // Используй метод findOrFail для получения пользователя или вызовет исключение, если он не найден
        return $this->findOrFail($user_id);
    }

}
