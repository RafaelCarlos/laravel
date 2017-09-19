<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        //Registrando todas as rotas que o Passport utiliza
        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addMinutes(1));

        Passport::tokensCan(['usuario' => 'Usuario comum',
            'administrador' => 'Administrador do sistema']);

        //
    }

}
