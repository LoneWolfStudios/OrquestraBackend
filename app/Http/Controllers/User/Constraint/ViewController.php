<?php

namespace Orquestra\Http\Controllers\User\Constraint;

use Illuminate\Http\Request;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function getCreate() 
    {
        return view('user.constraint.create');
    }
    
    public function getDetail() 
    {
        return view('user.constraint.detail');
    }
}
