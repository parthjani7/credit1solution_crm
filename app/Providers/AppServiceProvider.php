<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!$this->app->environment('local')) {
            URL::forceScheme('https');
        }

        $this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar',
			'App\Services\ContractAgreementService'
		);
    }
}
