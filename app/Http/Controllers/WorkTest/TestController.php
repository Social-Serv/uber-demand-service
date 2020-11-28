<?php

namespace App\Http\Controllers\WorkTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function testPush(Request $request)
    {
        $response = Http::withHeaders(['Accept' => 'application/json'])
            ->get('https://uber-main-db.herokuapp.com/api/car_classes');

        return response($response->getBody())->header('Content-Type', 'application/json');
        // TODO send to pusher notification
        // return response()->json(['status' => 'ok']);
    }
}
