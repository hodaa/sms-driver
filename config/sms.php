<?php

/*
 |--------------------------------------------------------------------------
 | The default SMS Driver
 |--------------------------------------------------------------------------
 |
 | The default sms driver to use as a fallback when no driver is specified
 | while using the SMS component.
 |
 */


return [

    'default' => env('SMS_DRIVER', 'nexmo'),
    /*
      |--------------------------------------------------------------------------
      | Nexmo Driver Configuration
      |--------------------------------------------------------------------------
      |
      | We specify key, secret, and the number messages will be sent from.
      |
      */

    'nexmo' => [
        'key' => env('NEXMO_KEY', ''),
        'secret' => env('NEXMO_SECRET', ''),
        'from' => env('NEXMO_SMS_FROM', '')
    ] ,

    /*
   |--------------------------------------------------------------------------
   | Twilio Driver Configuration
   |--------------------------------------------------------------------------
   |
   | We specify key, secret, and the number messages will be sent from.
   |
   */
    
    'twilio' => [
        'key' => env('twilio_KEY', ''),
        'secret' => env('twilio_SECRET', ''),
        'from' => env('twilio_SMS_FROM', '')
    ]

];
