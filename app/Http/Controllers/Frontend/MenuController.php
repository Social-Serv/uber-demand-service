<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MenuController extends Controller
{
    /**
     * The classes of cars available
     */
    public function carClasses()
    {
        $url = config('third_party_api.proxy.host') . config('third_party_api.db_service.urls.get_car_classes') . config('third_party_api.db_service.proxy_param');
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);
        return response($response->json())->header('Content-Type', 'application/json');
    }
}
