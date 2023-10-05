<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
     */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => "367796673414-8k22rsmc2ng56g9opt59hrjqq7bmjdml.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => env('APP_URL') . '/login',
    ],

    // add facebook
    'facebook' => [
        'client_id' => "281264218169210",
        'client_secret' => "5a6f05b8eca996166235a5f9ca98d261",
        'redirect' => env('APP_URL') . '/login',
    ],

];
