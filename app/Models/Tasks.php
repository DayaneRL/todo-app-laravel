<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
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
