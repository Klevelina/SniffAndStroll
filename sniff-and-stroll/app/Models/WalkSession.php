<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalkSession extends Model
{
    protected $fillable = [
        'owner_id',
        'walker_id',
        'dog_id',
        'scheduled_at',
        'duration_minutes',
        'status',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function walker()
    {
        return $this->belongsTo(User::class, 'walker_id');
    }

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
