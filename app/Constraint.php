<?php

namespace Orquestra;

use Illuminate\Database\Eloquent\Model;

class Constraint extends Model
{
    protected $fillable = [
        "device_id",
        "visualization_id",
        "name",
        "desc",
        "value"
    ];
}
