<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * TODO: remove on deploy
 */
Route::get('front-test/test-push', 'WorkTest\TestController@testPush');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('rider')->name('rider.')->group(function () {
    Route::post('find_driver', 'Frontend\RiderController@findDriver');
    Route::post('cancel_ride/{rider_id}/{driver_id}', 'Frontend\RiderController@cancelRide');
    Route::post('request_ride/{rider_id}/{driver_id}/{ride_temp_id?}', 'Frontend\RiderController@requestRide');
});

Route::prefix('menu')->name('menu.')->group(function () {
    Route::prefix('car')->name('car.')->group(function () {
        Route::get('car_classes', 'Frontend/MenuController@carClasses');
        Route::get('car_brands', 'Frontend/MenuController@carBrands');
        Route::get('car_capacities', 'Frontend/MenuController@carCapacities');
    });
});
