<?php

namespace App\Http\Controllers\Backend;

use App\Events\DriverFound;
use App\Events\DriverLocationUpdated;
use App\Events\TripCompleted;
use App\Events\TripIdGenerated;
use App\Events\TripInfoReceived;
use App\Events\TripStarted;
use App\Events\TripWasCancelled;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverFoundRequest;
use App\Http\Requests\PushTripInfoRequest;
use App\Http\Requests\TripCancelledRequest;
use App\Http\Requests\TripCompletedRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PushController extends Controller
{
    public function tripInfo(PushTripInfoRequest $request)
    {
        $data = $request->validated();
        event(new TripInfoReceived($data));
    }

    public function tripCompleted(TripCompletedRequest $request)
    {
        $data = $request->validated();
        event(new TripCompleted($data));
    }

    public function driverFound(DriverFoundRequest $request)
    {
        $data = $request->validated();
        $url = config('proxy.host') . config('db_service.urls.get_driver') . $data['driver_id'] . config('db_service.proxy_param');
        $responseDriver = Http::withHeaders(['Accept' => 'application/json'])->get($url);

        $driverFoundData = [
            'rider_id' => $data['rider_id'],
            'trip_id' => $data['trip_id'],
            'additional_payload' => $data['payload'],
            'driver' => $responseDriver->json()
        ];

        event(new DriverFound($driverFoundData));
    }

    public function tripInfoShort(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'trip_id' => 'required'
        ]);

        $data_mapped = [
            'rider_id' => $data['client_id'],
            'trip_id' => $data['trip_id']
        ];

        event(new TripIdGenerated($data_mapped));
    }

    public function tripWasCancelled(TripCancelledRequest $request)
    {
        event(new TripWasCancelled($request->validated()));
    }

    public function tripStarted(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required'
        ]);

        event(new TripStarted($data));
    }

    public function driverLocationUpdate(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'payload' => 'required'
        ]);

        event(new DriverLocationUpdated($data));
    }
}
