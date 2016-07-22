<?php

namespace Orquestra\Http\Controllers\Api\v1;

use DB;
use Event;
use View;
use Response;

use Illuminate\Http\Request;

use Orquestra\Device;
use Orquestra\Pin;
use Orquestra\Action;
use Orquestra\Constraint;
use Orquestra\Visualization;

use Orquestra\Events\User\DeviceWasCreated;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Api\ApiController;

class DeviceController extends ApiController
{

    public function find($id)
    {
        return Device::where('devices.id', $id)
                     ->join('users', function ($join) {
                         $join->on('users.id', '=', 'devices.user_id');
                     })
                     ->select(
                        'devices.*',
                        'users.name as user_name'
                     )->first();
    }

    public function byUser($id)
    {
        $devices = Device::where('devices.user_id', $id)
                         ->where('devices.active', true)
                         ->get();

        return collect($devices)->map(function ($device) {
            $device["pins"] = Pin::where('device_id', $device->id)
                                 ->where('active', true)->get();

            $device["visualizations"] = Visualization::where('device_id', $device->id)
                                                     ->where('active', true)->get();

            $device["constraints"] = Constraint::where('device_id', $device->id)
                                               ->where('active', true)->get();

            $device["actions"] = Action::where('device_id', $device->id)
                                       ->where('active', true)->get();

            return $device;
        });
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
