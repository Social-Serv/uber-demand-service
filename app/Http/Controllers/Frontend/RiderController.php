<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CancelTripByRiderRequest;
use App\Http\Requests\FindDriverRequest;
use App\Jobs\MakeDriverSearchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

    public function requestTripData($tripId)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.get_trip_info') . $tripId . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function ridersTrips($riderId)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.get_riders_trips.prefix') . $riderId . config('third_party_api.db_service.urls.get_riders_trips.postfix') . config('third_party_api.db_service.proxy_param');

        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function getRider($riderId)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.get_rider') . $riderId . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function getDriver($driverId)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.get_driver') . $driverId . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function createRider(Request $request)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.create_rider') . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($url, $request->all());
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function updateRider(Request $request, $riderId)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.update_rider') . $riderId . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($url, $request->all());
        return response($response->json())->header('Content-Type', 'application/json');
    }
    public function deleteRider(Request $request, $riderId)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.delete_rider') . $riderId . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->delete($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }


    /**
     * Cancel already requested (or aditionally confirmed by driver) trip.
     */
    public function cancelTrip(CancelTripByRiderRequest $request)
    {
        $data = $request->validated();
        $url = config('third_party_api.proxy.host') . config('third_party_api.trip_mngr.urls.cancel_trip') . config('third_party_api.db_service.proxy_param') . '&' . Arr::query(
            [
                'client_id' => $data['client_id'],
                'trip_id' => $data['trip_id']
            ]
        );

        $response = Http::withHeaders(['Accept' => 'application/json'])->post($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function getDriverLocation(Request $request, $driver_id)
    {

        // todo
        return [
            'location' => 'stub'
        ];

        // $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.get_driver') . $driverId . config('third_party_api.db_service.proxy_param');
        // $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        // return response($response->json())->header('Content-Type', 'application/json');
    }

    public function createDriver(Request $request)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.create_diver') . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($url, $request->all());
        return response($response->json())->header('Content-Type', 'application/json');
    }

    public function updateDriver(Request $request, $id)
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.update_driver') . $id . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->put($url, $request->all());
        return response($response->json())->header('Content-Type', 'application/json');
    }
}
