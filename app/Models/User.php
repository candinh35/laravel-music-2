<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'password',
        'wallet',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
    ];


    public function isAdmin()
    {
        return auth()->guard('admin')->check();
    }

    public function isClient()
    {
        return auth()->check();
    }

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'playlists', 'user_id', 'song_id');
    }

    public function transactionSongs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'transactions', 'user_id', 'song_id')->withPivot(['cost', 'created_at']);;
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', 'LIKE', '%' . $name . '%');
    }
}
