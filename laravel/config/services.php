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

    'onesignal'	=> [
    	'app_id' => env('ONESIGNAL_APP_ID', ''),
    	'rest_api_key' => env('ONESIGNAL_REST_API_KEY', ''),
	],
	
    'mailgun' => [
        'domain' => env('sandboxbeefd14c60914d63bae8986249531aa8.mailgun.org'),
        'secret' => env('330b8af8aeb24ec2114d296ea257678d-c9270c97-c2ce62b4'),
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
        'model' => App\Models\Admin::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
