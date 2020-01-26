<?php

return [
    'nexmo' => [
        'key' => env('NEXMO_KEY', ''),
        'secret' => env('NEXMO_SECRET', ''),
        'from' => env('NEXMO_SMS_FROM', '')
    ] ,
    'twilio' => [
        'key' => env('twilio_KEY', ''),
        'secret' => env('twilio_SECRET', ''),
        'from' => env('twilio_SMS_FROM', '')
    ]

];
