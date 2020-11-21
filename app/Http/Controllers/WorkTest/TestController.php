<?php

namespace App\Http\Controllers\WorkTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testPush()
    {
        // TODO send to pusher notification
        return response()->json(['status' => 'ok']);
    }
}
