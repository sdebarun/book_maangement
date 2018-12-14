<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\InterfaceContainer\AuthorInterface','App\Repositories\AuthorRepostiory');
        $this->app->bind('App\InterfaceContainer\PublishersInterface','App\Repositories\PublishersRepository');
    }
}
