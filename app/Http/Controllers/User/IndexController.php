<?php

namespace Orquestra\Http\Controllers\User;

use Illuminate\Http\Request;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class IndexController extends Controller
{
    
    public function getIndex() 
    {
        return view('user.index');
    }
    
}
