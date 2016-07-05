<?php

namespace Orquestra;

use Illuminate\Database\Eloquent\Model;

class ConstraintOccurrence extends Model
{
    
    protected $fillable = [
        "device_id",
        "visualization_id",
        "constraint_id",
        "value"
    ];
    
}
