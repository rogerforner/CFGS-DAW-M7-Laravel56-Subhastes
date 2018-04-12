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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID', 'e4061353d27f852f8f76'),         // Your Gmail Client ID
        'client_secret' => env('GITHUB_CLIENT_SECRET', '55d9ead28087f6891c5972ee706c47f13c5bb56b'), // Your Gmail Client Secret
        'redirect' => 'http://laravel5.6-subhastes.ooo/auth/github/callback',
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID', '877644700655-ftejtp95bj90og5kao2lt0lb6ct4h3i4.apps.googleusercontent.com'),         // Your Google Client ID
        'client_secret' => env('GOOGLE_CLIENT_SECRET', 'EuDZ0eJO6YLt__Q8RBbxbm3n'), // Your Google Client Secret
        'redirect' => 'http://laravel5.6-subhastes.ooo/auth/google/callback',
    ],
   'facebook' => [
        'client_id' => env('FACEBOOK_ID','325011751354708'),
        'client_secret' => env('FACEBOOK_SECRET','8223121f7da2098b47ceef055142f346'),
        'redirect' => env('FACEBOOK_REDIRECT_URL','http://laravel5.6-subhastes.ooo/auth/facebook/callback'),
    ],
];
