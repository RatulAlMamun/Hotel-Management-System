<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confarmations extends Model
{
    protected $fillable = [
        'user_id', 'name', 'message', 'status',
    ];
}
