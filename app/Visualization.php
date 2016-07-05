<?php

namespace Orquestra;

use DB;

use Illuminate\Database\Eloquent\Model;

class Visualization extends Model
{

    protected $fillable = [
        "name",
        "desc",
        "device_id",
        "x_id",
        "y_id",
        "z_id",
        "x_label",
        "y_label",
        "z_label",
        "formula"
    ];
    
}
