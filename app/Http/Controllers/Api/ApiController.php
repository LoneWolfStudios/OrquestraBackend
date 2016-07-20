<?php

namespace Orquestra\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $user;

    function __construct()
    {
        $this->user = Auth::guard('api')->user();
    }
}
