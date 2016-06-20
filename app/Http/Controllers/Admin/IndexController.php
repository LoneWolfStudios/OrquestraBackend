<?php

namespace Orquestra\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class IndexController extends Controller
{
    
    public function getIndex() 
    {
        return view('admin.index');
    }
    
}
