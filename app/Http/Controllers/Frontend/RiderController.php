<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CancelRideRequest;
use App\Http\Requests\FindDriverRequest;
use App\Jobs\MakeDriverSearchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RiderController extends Controller
{
    /**
     * Main app method. Used to find driver (car) by params and request the trip.
     * The trip id must be returned.
     */
    public function findDriver(FindDriverRequest $request)
    {
        $data = $request->validated();
        $url = config('proxy.host') . config('trip_mngr.urls.req_trip') . config('trip_mngr.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])
            ->post($url, $data);

        return response($response->json())->header('Content-Type', 'application/json');
    }

    /**
     * Cancel already requested (or aditionally confirmed by driver) ride.
     */
    public function cancelRide(CancelRideRequest $request)
    {
        $data = $request->validated();

        return response()->json([
            "message" => "cancelled"
        ]);
    }

    public function requestTripData($tripId)
    {
    }

    public function ridersTrips($riderId)
    {
    }

    public function getRider($riderId)
    {
    }

    public function getDriver($driverId)
    {
    }
}
