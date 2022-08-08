<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{

    protected $fillable = [
        'task',
        'user_id',
    ];
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
