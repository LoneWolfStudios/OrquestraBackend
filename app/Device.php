<?php

namespace Orquestra;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'nickname',
        'desc',
        'user_id'
    ];
}
