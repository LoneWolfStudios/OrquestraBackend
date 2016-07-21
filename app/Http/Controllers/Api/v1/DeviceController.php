<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Event;
use View;
use Response;

use Illuminate\Http\Request;

use Orquestra\Device;
use Orquestra\Pin;

use Orquestra\Events\User\DeviceWasCreated;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Api\ApiController;

class DeviceController extends ApiController
{

    public function find($id)
    {
        return Device::find($id);
    }

    public function byUser($id)
    {
        return Device::where('user_id', $id)
                     ->where('active', true)
                     ->get();
    }

    public function create(Request $request)
    {
        $device = Device::create($request->all());

        Event::fire(new DeviceWasCreated($device));

        return $device;
    }

    public function getSeed($id)
    {
        $seed = array();
        $headers = array();

        $seed["app_url"] = env('APP_URL');

        $seed["user"] = $this->user->name;
        $seed["api_token"] = $this->user->api_token;

        $seed["device"] = Device::where('id', $id)
                                ->select(
                                    "id", "nickname"
                                )->first();

        $seed["device"]["pins"] = Pin::where('active', true)
                                     ->where('device_id', $id)
                                     ->select(
                                        "id", "name"
                                     )->get();

        $headers["Content-Type"] = "application/json; charset=utf-8";
        $headers["Content-Disposition"] = "attachment; filename=" . $seed["device"]["nickname"] . ".seed";

        $seed = json_encode($seed, JSON_PRETTY_PRINT);

        return Response::make($seed, '200', $headers);
    }

}
