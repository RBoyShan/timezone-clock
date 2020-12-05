<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Collection' => 'App\Policies\CollectionPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-panel', function ($user) {
           return $user->role == 'admin';
        });
    }
}
