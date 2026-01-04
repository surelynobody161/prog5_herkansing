<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Art;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Verborgen velden bij serialisatie
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Typecasts voor velden
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relatie: een gebruiker heeft meerdere arts (posts)
     */
    public function arts()
    {
        return $this->hasMany(Art::class);
    }

    // Check of gebruiker admin is
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Check of gebruiker gewone user is
    public function isUser(): bool
    {
        return $this->role === 'user';
    }
}
