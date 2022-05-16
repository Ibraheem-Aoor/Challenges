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

    'firebase' => [
        'apiKey'=> "AIzaSyDrH5AVp3ntytdw8a2yMMxL8IbD7_Eiba4",
        'authDomain'=> "first-challnege.firebaseapp.com",
        'projectId'=> "first-challnege",
        'storageBucket'=> "first-challnege.appspot.com",
        'messagingSenderId'=> "970844158490",
        'appId'=> "1:970844158490:web:0e956fffe544448c8e6fa3",
        'measurementId'=> "G-106JX4GEHF",
    ],
    'facebook' => [
        'client_id' => 552252745918944,
        'client_secret' => '546b31c55e1373a30ef1afef4a17ba21',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],

    'google' => [
        'client_id' => '697541832836-u72c9m0g3io67m6qvht7ag8tc2dehji2.apps.googleusercontent.com',
        'client_secret' => 'zQd_TfItDKwllI4Ke-wwAGJ9',
        'redirect' => 'http://localhost:8000/callback/google',
    ],

];
