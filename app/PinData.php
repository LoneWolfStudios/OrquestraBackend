<?php

namespace Orquestra;

use Illuminate\Database\Eloquent\Model;

class PinData extends Model
{
    public function __construct($tableName) 
    {
        $this->table = $tableName;
    }
}
