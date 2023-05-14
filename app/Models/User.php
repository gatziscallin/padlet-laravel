<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;

class User extends Authenticatable
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
}
