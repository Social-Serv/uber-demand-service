<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CancelRideRequest;
use App\Http\Requests\FindDriverRequest;
use App\Jobs\MakeDriverSearchRequest;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    /**
     * Main app method. Used to find driver (car) by params and request the ride.
     */
    public function findDriver(FindDriverRequest $request)
    {
        $data = $request->validated();
        dispatch(new MakeDriverSearchRequest($data));

        return response()->json([
            "message" => "Request sent. Wait",
            'request_body' => $data
        ]);
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
}
