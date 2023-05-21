<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\hasMany;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'image',
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

    // Ein User hat viele Padlets
    public function padlet() : hasMany {
        return $this->hasMany(Padlet::class);
    }

    // Ein User hat viele Comments
    public function comment() : HasMany {
        return $this->hasMany(Comment::class);
    }

    // Ein User hat viele Userrights auf unterschiedlichen Padlets
    public function userright() : HasMany {
        return $this->hasMany(Userright::class);
    }

    // Ein User hat viele Ratings
    public function rating() : HasMany {
        return $this->hasMany(Rating::class);
    }

    // Ein User hat viele Entries
    public function entrie() : HasMany {
        return $this->hasMany(Entrie::class);
    }

    /* ---- auth JWT ---- */
    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return ['user' => ['id' => $this->id]];
    }

}
