<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use DB;
use Event;

use Orquestra\Events\User\PinDataWasInserted;

use Orquestra\PinData;
use Orquestra\Visualization;
use Orquestra\Device;
use Orquestra\Pin;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class DataController extends Controller
{

    public function send(Request $request)
    {
        $device = Device::find($request->device_id);
        $pins = Pin::where('active', true)
                   ->get();

        foreach ($request->data as $key => $value)
        {
            $pd = new PinData("device_data_" . $device->id);

            $pd->pin_id = collect($pins)->search(function ($item) use ($value) {
                return $item->name == $value["name"];
            })["id"];

            $pd->value = $value["value"];

            $pd->save();
        }

        Event::fire(new PinDataWasInserted($device, $request));
    }

    public function byPin($id)
    {
        $pin = Pin::find($id);

        return DB::table("device_data_$pin->device_id")
                 ->where('pin_id', $id)
                 ->where('active', true)
                 ->get();
    }

}
