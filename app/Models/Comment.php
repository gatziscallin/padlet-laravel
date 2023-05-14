<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'entrie_id',
        'comment',
    ];

    // Ein Comment gehört zu einem Entry
    public function entrie() : BelongsTo {
        return $this->belongsTo(Entrie::class);
    }

    // Ein Comment gehört zu einem User
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
