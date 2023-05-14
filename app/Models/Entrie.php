<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Entrie extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'entrie_id',
        'title',
        'content'
    ];

    // Ein Entry gehört zu einem User
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Ein Entry gehört zu einem Padlet
    public function padlet() : BelongsTo {
        return $this->belongsTo(Padlet::class);
    }

    // Ein Entry hat mehrere Ratings
    public function rating() : hasMany {
        return $this->hasMany(Rating::class);
    }

    // Ein Entry hat mehrere Comments
    public function comment() : hasMany {
        return $this->hasMany(Comment::class);
    }
}
