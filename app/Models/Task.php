<?php

namespace App\Models;
use App\Models\User;

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
