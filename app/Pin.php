<?php

namespace Orquestra;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    protected $fillable = [
        'device_id',
        'name',
        'desc'
    ];
}
