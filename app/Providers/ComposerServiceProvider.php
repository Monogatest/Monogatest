<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      //Navigation Composers
      view()->composer('partials.nav._home',
      \App\Http\ViewComposers\HomeNavigationComposer::class
      );

      view()->composer('partials.nav._app',
      \App\Http\ViewComposers\AppNavigationComposer::class
      );


      view()->composer('partials.sidebar',
      \App\Http\ViewComposers\SidebarComposer::class
      );


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
