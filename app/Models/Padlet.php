<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Padlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'is_public',
    ];

    // Beziehung zwischen den Models verankern

    // Ein Padlet gehört zu einem User
    public function user() : BelongsTo {
        return $this->belongsTo(User::class)->withTimestamps();
    }

    // Ein Padlet hat mehrere Entries
    public function entries() : hasMany {
        return $this->hasMany(Entrie::class);
    }

    // Ein Padlet hat mehrere UserRights an User vergeben
    public function userright() : HasMany {
        return $this->hasMany(Userright::class);
    }
}
