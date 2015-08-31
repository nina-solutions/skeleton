<?php

namespace FairHub\Providers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function($sql, $bindings, $time) {
            if('local' == env('APP_ENV')) {
                echo $sql . PHP_EOL;
                print_r($bindings);
                echo $time . PHP_EOL;
                echo PHP_EOL;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
