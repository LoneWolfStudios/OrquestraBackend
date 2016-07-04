<?php

namespace Orquestra\Http\Controllers\User\Visualization;

use Illuminate\Http\Request;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function getCreate() 
    {
        return view('user.visualization.create');
    }
    
    public function getDetail() 
    {
        return view('user.visualization.detail');
    }
}
