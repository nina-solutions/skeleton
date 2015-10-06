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

use Illuminate\Support\Facades\App;

Route::get('/', ['as' => 'welcome', 'uses' => 'CustomController@welcome']);

Route::match(
    ['get','post'],
    '{lang}/press-accreditation/register/{role}/{code}',
    ['middleware' => 'role', 'as' => 'press-register-locale', function($lang, $role,$code){
        App::setLocale($lang);
        session(['lang' => App::getLocale()]);
        $request = Route::getCurrentRequest();
        $controller = App::make('PressAccreditationController');
        return $controller->callAction('create', ['request' => $request, 'role' => $role, 'code' => $code]);
    }]
);

Route::get(
    'thanks',
    ['as' => 'thanks', function(){
        return view('thanks');
    }]
);

Route::match(
    ['get','post'],
    'press-accreditation/register/{role}/{code}',
    ['middleware' => 'role', 'as' => 'press-register', 'uses' => 'PressAccreditationController@create']
);
Route::post(
    'press-accreditation/save/{role}/{code}',
    ['middleware' => 'role', 'as' => 'press-save', 'uses' => 'PressAccreditationController@store']
);

Route::get(
    'check/{code}',
    function($code){
        $fair = \FairHub\Models\Fair::code($code)->first();
        $edition = \FairHub\Models\FairEdition::code($code)->first();
        $faircodes = \FairHub\Models\FairEdition::active()->get();
        $codes = [];
        foreach($faircodes as $faircode){
            $codes[] = $faircode->fairCode;
        }
        return response()->json([$codes, $fair->toArray(), $fair->description, $edition->toArray(), $edition->translatedDescription]);
    }
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

// Admin area
Route::get(
    'admin',
    function () {
        return redirect('/admin/dashboard');
    });
Route::group(
    [
        'as' => 'admin::',
        'namespace' => 'Admin',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('dashboard', ['as' => 'dashboard', function () {
            // Route named "admin::dashboard"

        }]);
    });

// Logging in and out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);