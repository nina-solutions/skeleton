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
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Route::get('/', ['as' => 'welcome', 'uses' => 'CustomController@welcome']);
Route::get('home', ['as' => 'home', 'uses' => 'CustomController@home']);




//Visa Accreditation routes
Route::get(
    '{lang}/visa/register/{type}/{code}',
    [ 'middleware' => 'visa-check-language', 'as' => 'visa-register', 'uses' => 'VisaController@create']
);
Route::post(
    '{lang}/visa/save/{type}/{code}',
    [ 'middleware' => 'visa-check-language', 'as' => 'visa-save', 'uses' => 'VisaController@store']
);
Route::match(
    ['get','post'],
    '{lang}/visa/ajax/{operation}',
    [ 'as' => 'visa-ajax', 'uses' => 'VisaController@ajax']
);
Route::get(
    '{lang}/visa/thanks/',
    [ 'as' => 'visa-thanks' , 'uses' => 'VisaController@thanks' ]
);


Route::get('{lang}/{faircode}/{service}{format?}',
    ['as' => 'service-index', 'uses' => 'ServiceController@index']
)->where(['format' => '\.(json|xml|rss)']);
Route::get('{lang}/{faircode}/{service}/{id}{format?}',
    ['as' => 'service-index', 'uses' => 'ServiceController@show']
)->where(['format' => '\.(json|xml|rss)']);
//Route::get('{lang}/{code}/{service}/{id}{format}')->where(['format' => '\.?(json|xml|rss)?']);



Route::match(
    ['get','post'],
    '{lang}/press-accreditation/register/{role}/{code}',
    ['middleware' => 'channelrole', 'as' => 'press-register-locale', function($lang, $role,$code){
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
    ['middleware' => 'channelrole', 'as' => 'press-register', 'uses' => 'PressAccreditationController@create']
);
Route::post(
    'press-accreditation/save/{role}/{code}',
    ['middleware' => 'channelrole', 'as' => 'press-save', 'uses' => 'PressAccreditationController@store']
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

Route::group(
    [
        'prefix' => 'admin',
        //'as' => 'admin::',
        'middleware' => ['auth', 'acl', 'contents']
    ],
    function () {
        Route::match(
            ['get','post'],
            'dashboard',
            ['as' => 'dashboard', 'uses' => 'CustomController@dashboard']);

        Route::resource('events', 'EventsController');

        Route::resource('{contentable_type}/content', 'HubController');

        Route::resource('categories', 'CategoriesController');
        Route::resource('languages', 'LanguagesController');
        Route::resource('contexts', 'ContextController');
        Route::resource('contents', 'ContentController');
        Route::resource('users', 'UserController');

});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');