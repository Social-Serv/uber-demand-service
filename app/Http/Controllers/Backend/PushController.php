<?php

namespace App\Http\Controllers\Backend;

use App\Events\TripInfoReceived;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverFoundRequest;
use App\Http\Requests\PushTripInfoRequest;
use Illuminate\Http\Request;

class PushController extends Controller
{
    public function tripInfo(PushTripInfoRequest $request)
    {
        $data = $request->validated();
        event(new TripInfoReceived($data));
    }

    public function driverFound(DriverFoundRequest $request)
    {
        $data = $request->validated();
        event(new TripInfoReceived($data));
    }
}
