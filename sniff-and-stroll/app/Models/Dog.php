<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'breed',
        'age',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function walkSessions()
    {
        return $this->hasMany(WalkSession::class);
    }
}
