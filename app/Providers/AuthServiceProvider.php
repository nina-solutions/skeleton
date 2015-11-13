<?php

namespace FairHub\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'FairHub\Models\User' => 'FairHub\Policies\UserPolicy',
        'FairHub\Models\Context' => 'FairHub\Policies\ContextPolicy',
        'FairHub\Models\Content' => 'FairHub\Policies\ContentPolicy',
        'FairHub\Models\Category' => 'FairHub\Policies\CategoryPolicy',
        'FairHub\Models\Language' => 'FairHub\Policies\LanguagePolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        //KarolyNote
        //if you introduce any kind of bug here, sorry no more permission will be granted!
        //any request will return false

        $this->registerPolicies($gate);
        $gate->before(function ($user, $ability) {
            if ($user->isSuper()) {
                return true;
            }
        });
    }
}