<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'walk_session_id',
        'reviewer_id',
        'walker_id',
        'rating',
        'comment',
    ];

    public function walkSession()
    {
        return $this->belongsTo(WalkSession::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function walker()
    {
        return $this->belongsTo(User::class, 'walker_id');
    }
}
