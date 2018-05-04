<?php

namespace ToxaGeek\LocalizationSDK;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/localization.php' => config_path('localization.php'),
        ]);
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'localization');
        $this->loadJsonTranslationsFrom(__DIR__.'/resources/lang');

        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/localization'),
        ]);

        if (Cookie::get('localization', null) == null) {
            if (auth()->check() && method_exists(auth()->user(), 'getLocalization')) {
                Cookie::queue(Cookie::make('localization', auth()->user()->getLocalization(), 43200));
            } else {
                Cookie::queue(Cookie::make('localization', config('localization.default', null), 43200));
            }
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
