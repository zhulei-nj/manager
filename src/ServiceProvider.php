<?php

namespace zhulei\Manager;

use Laravel\Socialite\SocialiteServiceProvider;
use zhulei\Manager\Contracts\Helpers\ConfigRetrieverInterface;
use zhulei\Manager\Helpers\ConfigRetriever;

class ServiceProvider extends SocialiteServiceProvider
{
    public function boot()
    {
        $socialiteWasCalled = app(SocialiteWasCalled::class);

        event($socialiteWasCalled);
    }

    public function register()
    {
        parent::register();

        if (class_exists('Laravel\Lumen\Application') && !defined('ZHULEI_STATELESS')) {
            define('ZHULEI_STATELESS', true);
        }

        $this->app->singleton(ConfigRetrieverInterface::class, function () {
            return new ConfigRetriever();
        });
    }
}
