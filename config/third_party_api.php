<?php
// https://proxy-service/client/request-trip?forward="TripManager"
return [
    'proxy' => [
        'host' => 'https://uber-proxy.herokuapp.com/api/rider/',
    ],
    'trip_mngr' => [
        'name' => 'trip-mgr',
        'proxy_param' => '?fwd=trip-mgr',
        'urls' => [
            'req_trip' => 'client/request-trip',
            'cancel_trip' => 'client/cancel-trip'
        ]
    ],
    'db_service' => [
        'name' => 'storage',
        'proxy_param' => '?fwd=storage',
        'urls' => [
            'get_driver' => 'api/front/car/',
            'get_rider' => 'api/front/rider/',
            'get_car_classes' => 'api/car_classes',
            'get_trip_info' => 'api/services/trip/',
            'get_riders_trips' => [
                'prefix' => 'api/front/rider/',
                'postfix' => '/trips'
            ],
            'create_rider' => 'api/front/rider',
            'update_rider' => 'api/front/rider/',
            'delete_rider' => '/api/front/rider/',
            'create_diver' => 'api/front/car',
            'update_driver' => 'api/front/car/',
            'delete_driver' => '/api/front/car/',

        ]
    ]
];
