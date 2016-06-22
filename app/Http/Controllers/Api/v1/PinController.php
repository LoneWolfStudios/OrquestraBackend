<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Orquestra\Pin;
use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class PinController extends Controller
{
    public function byDevice($id) 
    {
        return Pin::where('device_id', $id)
                  ->where('active', true)
                  ->get();
    }
}
