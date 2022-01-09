<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Facility;
use App\Models\UserCards;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Facility::class, function ($app) {
            return Facility::find(request()->object_uuid);
        });

        $this->app->singleton(UserCards::class, function ($app) {
            return UserCards::with('user')->find(request()->card_uuid);
        });
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
