<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => storage_path('database.sqlite'),
            'prefix'   => '',
        ],

        'mysql' => [
            'driver'    => env('MY_DRIVER'),
            'host'      => env('MY_HOST'),
            'database'  => env('MY_DATABASE'),
            'username'  => env('MY_USERNAME'),
            'password'  => env('MY_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
            'strict'    => false,
        ],


        'pgsql' => [
            'driver'   => env('PG_DRIVER'),
            'host'     => env('PG_HOST'),
            'database' => env('PG_DATABASE'),
            'username' => env('PG_USERNAME'),
            'password' => env('PG_PASSWORD'),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ],

        'dw' => [
            'driver'   => env('DW_DRIVER'),
            'host'     => env('DW_HOST'),
            'database' => env('DW_DATABASE'),
            'username' => env('DW_USERNAME'),
            'password' => env('DW_PASSWORD'),
            'charset'  => 'utf8',
            'collation' => 'utf8_general_ci',
            'schema'   => 'public',
            'prefix'   => '',
        ],

        'mn' => [
            'driver'   => env('MN_DRIVER'),
            'host'     => env('MN_HOST'),
            'database' => env('MN_DATABASE'),
            'username' => env('MN_USERNAME'),
            'password' => env('MN_PASSWORD'),
            'charset'  => 'utf8',
            'collation' => 'utf8_general_ci',
            'schema'   => 'public',
            'prefix'   => '',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host'     => env('REDIS_HOST'),
            'port'     => env('REDIS_PORT'),
            'database' => env('REDIS_DATABASE'),
        ],

    ],

];
