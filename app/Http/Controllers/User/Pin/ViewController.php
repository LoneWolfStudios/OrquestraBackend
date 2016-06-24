<?php

namespace Orquestra\Http\Controllers\User\Pin;

use Illuminate\Http\Request;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function getCreate() 
    {
        return view('user.pin.create');
    }
}
