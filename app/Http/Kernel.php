<?php

namespace FairHub\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \FairHub\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \FairHub\Http\Middleware\VerifyCsrfToken::class,
        \FairHub\Http\Middleware\Localization::class,
        //\Efficiently\JqueryLaravel\VerifyJavascriptResponse::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \FairHub\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \FairHub\Http\Middleware\RedirectIfAuthenticated::class,
        'channelrole' => \FairHub\Http\Middleware\ChannelRoleMiddleware::class,
        'acl' => \FairHub\Http\Middleware\AclMiddleware::class,
        'contents' => \FairHub\Http\Middleware\ContentsMiddleware::class,
    ];
}
