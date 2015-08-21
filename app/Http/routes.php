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
    '{locale}/press-accreditation/create/{code}',
    ['as' => 'press-register-locale', function($locale, $code){
        App::setLocale($locale);
        $controller = App::make('PressAccreditationController');
        return $controller->callAction('create', ['code' => $code]);
        //$pressAccreditationController = new \FairHub\Http\Controllers\PressAccreditationController();
        //return $pressAccreditationController->create();

    }]
);

Route::get(
    'thanks',
    ['as' => 'thanks', function(){
        return view('thanks');
    }]
);

Route::get(
    'press-accreditation/create/{code}',
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
