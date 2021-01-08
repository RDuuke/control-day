<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\UrlGenerator;
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
       if(env('REDIRECT_HTTPS')) {
          $this->app['request']->server->set('HTTPS', true);
       }
    }

   /**
    * Bootstrap any application services.
    *
    * @param UrlGenerator $uri
    * @return void
    */
    public function boot(UrlGenerator $uri)
    {
       if (env('REDIRECT_HTTPS')) {
          $uri->formatScheme('https://');
       }
    }
}
