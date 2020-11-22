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

Route::prefix('rider')->name('rider.')->group(function () {
    Route::post('find_driver', 'Frontend\RiderController@findDriver');
    Route::post('cancel_ride', 'Frontend\RiderController@cancelRide');
    Route::get('trip_data/{trip_id}', 'Frontend\RiderController@requestTripData');
    Route::get('{rider_id}/trips', 'Frontend\RiderController@ridersTrips');

    Route::get('{rider_id}', 'Frontend/RiderController@getRider');
    Route::post('/', 'Frontend/RiderController@createRider');
    Route::put('{rider_id}', 'Frontend/RiderController@updateRider');
});

Route::prefix('driver')->name('driver.')->group(function () {
    Route::get('{id}', 'Frontend\RiderController@getDriver');
});

Route::prefix('menu')->name('menu.')->group(function () {
    Route::prefix('car')->name('car')->group(function () {
        Route::get('car_classes', 'Frontend/MenuController@carClasses');
    });
});

Route::prefix('services')->name('services.')->group(function () {
    Route::prefix('back_to_client')->name('car')->group(function () {
        Route::post('tripinfo', 'Backend/PushController@tripInfo');
        Route::post('driver_found', 'Backend/PushController@driverFound');
    });
});

/**
 * TODO: remove on deploy
 */
Route::post('front-test/test-push', 'WorkTest\TestController@testPush');
