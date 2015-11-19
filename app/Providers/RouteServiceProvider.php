<?php

namespace FairHub\Providers;

use FairHub\Models\Context;
use FairHub\Models\DW_MACROCATEGORIE;
use FairHub\Models\FairEdition;
use FairHub\Models\Language;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'FairHub\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->pattern('id', '[0-9]+');
        $codes = Context::all()->pluck('fullCode')->toArray();
        $router->pattern('faircode', '('.implode('|', $codes).')');
        $codes = Language::all()->pluck('code')->toArray();
        $router->pattern('lang', '('.implode('|', $codes).')');
        $entities = config('hub-contents');
        $regex = [];
        foreach( $entities as $entity){
            $regex[] = implode('|', $entity['url']);
        }
        $router->pattern('service', '('.implode('|', $regex).')');
/*
        $faircodes = FairEdition::active()->get();
        $codes = [];
        foreach($faircodes as $faircode){
            $codes[] = $faircode->fairCode;
        }
        //Fair code structure for code parameter
        $router->pattern('code', implode('|', $codes));
        */
        //accepted roles
        $roles = implode('|',array_keys(config('press-accreditation.channels')));
        $router->pattern('role', $roles);
        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
