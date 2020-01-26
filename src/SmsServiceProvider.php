<?php

namespace  Hoda\SMS\Providers;

use Illuminate\Support\ServiceProvider;
use Hoda\SMS\SmsManger;

class SmsServiceProvider extends ServiceProvider
{
    protected $defer = true;


    public function boot(){

        $dist = __DIR__.'/../config/sms.php';

        // If we're installing in to a Lumen project, config_path
        // won't exist so we can't auto-publish the config
        if (function_exists('config_path')) {
            // Publishes config File.
            $this->publishes([
                $dist => config_path('sms.php'),
            ]);
        }

        // Merge config.
        $this->mergeConfigFrom($dist, 'sms');
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sms', function ($app) {
            return new SmsManger($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sms'];
    }
}
