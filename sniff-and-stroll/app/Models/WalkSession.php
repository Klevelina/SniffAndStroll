<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalkSession extends Model
{
    protected $fillable = [
        'dog_id',
        'walker_id',
        'owner_id',
        'scheduled_at',
        'duration_minutes',
        'status',
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }

    public function walker()
    {
        return $this->belongsTo(User::class, 'walker_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
