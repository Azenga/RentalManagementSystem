<?php

namespace App\Providers;

use App\Role;
use Illuminate\Auth\Access\Response;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-roles', function($user){

            return $user->roles
                        ->contains(Role::where('title', 'super-admin')->first())
                        ? Response::allow()
                        : Response::deny('You must be a super administrator.');

        });
    }
}
