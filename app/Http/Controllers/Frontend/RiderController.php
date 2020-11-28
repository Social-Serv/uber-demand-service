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
        $url = config('proxy.host') . config('db_service.urls.get_trip_info') . $tripId . config('db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function ridersTrips($riderId)
    {
        $url = config('proxy.host') . config('db_service.urls.get_riders_trips.prefix') . $riderId . config('db_service.urls.get_riders_trips.postfix') . config('db_service.proxy_param');

        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function getRider($riderId)
    {
        $url = config('proxy.host') . config('db_service.urls.get_rider') . $riderId . config('db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function getDriver($driverId)
    {
        $url = config('proxy.host') . config('db_service.urls.get_driver') . $driverId . config('db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function createRider(Request $request)
    {
        $url = config('proxy.host') . config('db_service.urls.create_rider') . config('db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($url, $request->all());
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function updateRider(Request $request, $riderId)
    {
        $url = config('proxy.host') . config('db_service.urls.update_rider') . $riderId . config('db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($url, $request->all());
        return response($response->json())->header('Content-Type', 'application/json');
    }
}
