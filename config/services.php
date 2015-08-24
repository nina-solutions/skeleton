<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => 'sandbox9ca951d433d14e42a1aa36543aae7d53.mailgun.org',
        'secret' => 'key-afdfbc9ed4a511e32d4b0f4def011883',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => FairHub\User::class,
        'key'    => '',
        'secret' => '',
    ],

];
