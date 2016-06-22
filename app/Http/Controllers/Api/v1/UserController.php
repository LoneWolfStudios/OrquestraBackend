<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Api\ApiController;

class UserController extends ApiController
{
    public function index() 
    {
        return $this->user;
    }
}
