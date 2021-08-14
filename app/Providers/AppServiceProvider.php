<?php

namespace App\Providers;

use App\Payments\PaymentGateway;
use App\Payments\PlaceToPlayPaymentGateway;
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
        $this->app->bind(PaymentGateway::class,PlaceToPlayPaymentGateway::class );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
