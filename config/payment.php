<?php

return [
    'auth' => [
        'login' => env('PAYMENT_LOGIN', '6dd490faf9cb87a9862245da41170ff2'),
        'tranKey' => env('PAYMENT_TRANKEY', '024h1IlD'),
        'url' =>  env('PAYMENT_URL', 'https://dev.placetopay.com/redirection'),
        'rest' => [
            'timeout' => env('PAYMENT_REST_TIME_OUT', 45),
            'connect_timeout' => env('PAYMENT_REST_CONNECT_OUT', 30),
        ],
    ],
    'states' => [
        //System and gateway values must match
        'gateway' => [
            'PENDING' => 'PENDING', //statu
            'APPROVED' => 'PAYED',
            'REJECTED' => 'REJECTED',
        ],
        'system' => [
            //name and color key are required 
            'PENDING' => [
                'name' => 'Pendiente',
                'color' => 'warning'
            ],
            'PAYED' => [
                'name' => 'Pagado',
                'color' => 'success'
            ],
            'REJECTED' => [
                'name' => 'Rechazado',
                'color' => 'danger'
            ],
        ],
        'initial'=>'PENDING',// initial stage when create order
        'restart'=> 'REJECTED' //state to restart new payment request 
    ],

    'currency' => env('PAYMENT_CURRENCY', 'COP'),
];
