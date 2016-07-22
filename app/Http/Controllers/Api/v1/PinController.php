<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Orquestra\Pin;
use Orquestra\Constraint;
use Orquestra\Visualization;
use Orquestra\Action;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class PinController extends Controller
{
    public function byDevice($id)
    {
        $pins = Pin::where('pins.device_id', $id)
                   ->where('pins.active', true)
                   ->get();

        return collect($pins)->map(function ($pin) {
            $pin["visualizations"] = Visualization::where('active', true)
                                                  ->where('x_id', $pin->id)
                                                  ->orWhere('y_id', $pin->id)
                                                  ->orWhere('z_id', $pin->id)
                                                  ->get();

            $pin["constraints"] = collect($pin["visualizations"])->map(function ($f) {
                return Constraint::where('active', true)
                                 ->where('visualization_id', $f->id)
                                 ->get();
            })->flatten()->all();

            $pin["actions"] = collect($pin["constraints"])->map(function ($c) {
                return Action::where('active', true)
                             ->where('Constraint_id', $c->id)
                             ->get();
            })->flatten()->all();

            return $pin;
        });
    }

    public function create(Request $request)
    {
        return Pin::create($request->all());
    }

    public function find($id)
    {
        return Pin::find($id);
    }
}
