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
        ]
    ]
];
