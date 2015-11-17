<?php

namespace FairHub\Providers;

use FairHub\Models\Category;
use FairHub\Models\Content;
use FairHub\Models\Context;
use FairHub\Models\Language;
use FairHub\Models\User;
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
            if('local' === env('APP_ENV')
            && true === env('APP_DEBUG')
            && true === env('APP_ORM_DEBUG')) {
                echo $sql . PHP_EOL;
                print_r($bindings);
                echo $time . PHP_EOL;
                echo PHP_EOL;
            }
        });
        $sharedModels = [
            'user_model' => new User(),
            'language_model' => new Language(),
            'content_model' => new Content(),
            'context_model' => new Context(),
            'category_model' => new Category(),

        ];
        view()->share($sharedModels);
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
