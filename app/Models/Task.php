<?php

namespace App\Models;

class Task extends Authenticatable
{

    protected $fillable = [
        'task',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
