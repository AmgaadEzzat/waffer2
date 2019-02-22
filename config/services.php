<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '205536443616116',
        'client_secret' => 'd6663b0af5f29152892c46d4273eed91',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'dclu7ratjr33rp4hMz3d6PRsy',
        'client_secret' => 'GVzEu9siVf3lNQfZMb3UEyvskghiDrbqNJNfpYRucQQnFrGLFz',
        'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],

    'github' => [
        'client_id' => '8ad7df005176ba156c58',
        'client_secret' => 'e3daee788c857099b2d13fbd3e12163a032661ca',
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],

];
