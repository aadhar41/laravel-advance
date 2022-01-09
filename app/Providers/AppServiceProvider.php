<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelsComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\View;
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
        // Every time new instance.
        // $this->app->bind(PaymentGateway::class, function ($app) {
        //     return new PaymentGateway('eur');
        // });

        // Only one Instance of Payment Gateway.
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if (request()->has('credit')) {
                return new CreditPaymentGateway('usd');
            }

            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Option-1 - Every single view ( If we want data on every single view ).
        // View::share('channels', Channel::orderBy('name')->get());


        // Option -2 - Granular views with wildcards
        // View::composer(["post.*", "channel.index"], function ($view) {
        //     $view->with('channels', Channel::orderBy('name')->get());
        // });

        // Option - 3 Dedicated class
        // View::composer(["post.*", "channel.index"], ChannelsComposer::class);


        View::composer("partials.channels.*", ChannelsComposer::class);
    }
}
