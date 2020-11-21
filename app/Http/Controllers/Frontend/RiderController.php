<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FindDriverRequest;
use App\Jobs\MakeDriverSearchRequest;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    /**
     * @param Request $request has fields:
     * 
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
    public function cancelRide(Request $request, $riderId, $driverId)
    {
        // forward reqest
        return response()->json([
            "message" => "cancelled"
        ]);
    }

    /**
     * Used when rider choose a ride from the list
     */
    public function requestRide(Request $request, $riderId, $driverId, $rideTempId = -1)
    {
    }
}
