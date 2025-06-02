<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed $email
 */
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
        'is_agree_terms',
        'biography',
        'locale',
        'current_money',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_agree_terms' => 'boolean',
        ];
    }

    /**
     * @param Panel $panel
     * @return bool
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@savemoney.cl');
    }

    /**
     * @return Attribute
     */
    protected function firstname(): Attribute
    {
        return Attribute::make(
            get: fn ($firstname) => is_string($firstname)
                ? ucfirst($firstname)
                : $firstname,
            set: fn ($firstname) => is_string($firstname)
                ? strtolower($firstname)
                : $firstname
        );
    }

    /**
     * @return Attribute
     */
    protected function lastname(): Attribute
    {
        return Attribute::make(
            get: fn ($lastname) => is_string($lastname)
                ? ucfirst($lastname)
                : $lastname,
            set: fn ($lastname) => is_string($lastname)
                ? strtolower($lastname)
                : $lastname
        );
    }

    /**
     * @return HasMany
     */
    public function goals(): HasMany
    {
        $this->hasMany(Goal::class);
    }
}
