<?php

namespace Orquestra\Http\Controllers\User\Device;

use Illuminate\Http\Request;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class ViewController extends Controller
{

    public function getDetail() 
    {
        return view('user.device.detail');
    }
    
    public function getCreate() 
    {
        return view('user.device.create');
    }

}
