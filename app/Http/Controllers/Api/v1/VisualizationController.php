<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Orquestra\Visualization;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class VisualizationController extends Controller
{
    
    public function byDevice($id) 
    {
        return Visualization::where('device_id', $id)
                            ->where('active', true)
                            ->get();
    }

    public function create(Request $request) 
    {
        return Visualization::create($request->all());
    }
    
    public function find ($id) 
    {
        return Visualization::find($id);
    }
    
}
