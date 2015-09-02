<?php

namespace FairHub\Providers;

use FairHub\DW_MACROCATEGORIE;
use FairHub\FairEdition;
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

        $faircodes = FairEdition::active()->get();
        //$faircodes = DW_MACROCATEGORIE::fairCodes()->get();
        $codes = [];
        foreach($faircodes as $faircode){
            $codes[] = $faircode->fairCode;
        }
        //Fair code structure for code parameter
        $router->pattern('code', implode('|', $codes));
        //$router->pattern('code', '[A-Z]{3}[0-9]{2}');
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
