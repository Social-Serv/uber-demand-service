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

    Route::get('trip_data/{trip_id}', 'Frontend\RiderController@requestTripData');
    Route::get('{rider_id}/trips', 'Frontend\RiderController@ridersTrips');
    Route::post('trip/cancel', 'Frontend\RiderController@cancelTrip');

    Route::get('{rider_id}', 'Frontend/RiderController@getRider');
    Route::post('/', 'Frontend/RiderController@createRider');
    Route::delete('{rider_id}', 'Frontend/RiderController@deleteRider');
    Route::put('{rider_id}', 'Frontend/RiderController@updateRider');
});

Route::prefix('driver')->name('driver.')->group(function () {
    Route::get('{id}', 'Frontend\RiderController@getDriver');
    Route::get('location/{driver_id}', 'Frontend\RiderController@getDriverLocation');
});

Route::prefix('menu')->name('menu.')->group(function () {
    Route::prefix('car')->name('car')->group(function () {
        Route::get('car_classes', 'Frontend\MenuController@carClasses');
    });
});

Route::prefix('services')->name('services.')->group(function () {
    Route::prefix('back_to_client')->name('car')->group(function () {
        Route::post('tripinfo', 'Backend/PushController@tripInfo');
        Route::post('tripinfo/short', 'Backend/PushController@tripInfoShort');
        Route::post('trip_completed', 'Backend/PushController@tripCompleted');
        Route::post('driver_found', 'Backend/PushController@driverFound');
        Route::post('trip_was_cancelled', 'Backend/PushController@tripWasCancelled');
        //new
        Route::post('trip_started', 'Backend/PushController@tripStarted');
        Route::post('update_driver_location', 'Backend/PushController@driverLocationUpdate');
    });
});

/**
 * TODO: remove on production
 */
Route::get('front-test/test-push', 'WorkTest\TestController@testPush');
