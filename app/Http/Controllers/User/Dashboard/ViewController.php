<?php

namespace Orquestra\Http\Controllers\User\Dashboard;

use Illuminate\Http\Request;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class ViewController extends Controller
{
    
    public function getIndex() 
    {
        return view('user.dashboard.index');
    }
    
}
