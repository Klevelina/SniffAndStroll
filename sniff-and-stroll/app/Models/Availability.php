<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = [
        'walker_id',
        'day_of_week',
        'start_time',
        'end_time'
    ];

    public function walker()
    {
        return $this->belongsTo(User::class, 'walker_id');
    }
}
