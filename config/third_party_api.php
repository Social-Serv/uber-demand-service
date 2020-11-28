<?php
// https://proxy-service/client/request-trip?forward="TripManager"
return [
    'proxy' => [
        'host' => '/',
    ],
    'trip_mngr' => [
        'name' => 'trip-mgr',
        'proxy_param' => '?forward=trip-mgr',
        'urls' => [
            'req_trip' => 'client/request-trip'
        ]
    ],
    'db_service' => [
        'name' => 'storage',
        'proxy_param' => '?forward=storage',
        'urls' => [
            'get_driver' => '/',
            'get_rider' => '/',
            'get_car_classes' => '/',
            'get_trip_info' => '/',
            'get_riders_trips' => [
                'prefix' => '/',
                'postfix' => '/'
            ],
            'create_rider' => '/',
            'update_rider' => '/',
        ]
    ]
];
