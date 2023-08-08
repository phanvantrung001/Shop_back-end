<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        'App\Group' => 'App\Policies\GroupPolicy',
        'App\Category' => 'App\Policies\CategoryPolicy',
        'App\Product' => 'App\Policies\ProductPolicy',
        'App\Customer' => 'App\Policies\CustomerPolicy',
        'App\Order' => 'App\Policies\OrderPolicy',
        'App\Orderdetail' => 'App\Policies\OrderdetailPolicy',



    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
