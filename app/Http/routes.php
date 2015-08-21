<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'welcome', 'uses' => 'CustomController@welcome']);

Route::match(
    ['get','post'],
    '{locale}/press-accreditation/{action}/{code}',
    function($locale, $action, $code){
        App::setLocale($locale);
        $controllerClass = 'FairHub\\'.'PressAccreditation'.'Controller';
        $methodName = studly_case($action);
        //Just a translation example before the route works
        if(method_exists($controllerClass, $methodName)){
            $pressController = App::make($controllerClass);
            return $pressController->callAction($methodName, array('code' => $code));
        }
    }
);

Route::get(
    'press-accreditation/register/{code}',
    ['as' => 'press-register', 'uses' => 'PressAccreditationController@create']
);
Route::post(
    'press-accreditation/save/{code}',
    ['as' => 'press-store', 'uses' => 'PressAccreditationController@store']
);
/*
Route::group('{locale}/{service}/{action}/{code}', function ($locale='it', $service='subscriptions',$action='index', $code='') {
    App::setLocale($locale);
    $controllerClass = 'FairHub\\'.$service.'Controller';
    $action = studly_case($action); // optional, converts foo-bar into FooBar for example
    $methodName = $action;

    if(method_exists($controllerClass, $methodName)){
        $controller = App::make($controllerClass);
        return $controller->callAction($methodName, array());
    }
});
*/
