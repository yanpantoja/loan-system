<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Repositories\Contracts\CollectionRepositoryInterface',
            'App\Repositories\Eloquent\Collections\CollectionRepository'
        );

        $this->app->bind(
            'books',
            'App\Models\Collections\Book'
        );

        $this->app->bind(
            'cds',
            'App\Models\Collections\Cd'
        );

        $this->app->bind(
            'dvds',
            'App\Models\Collections\Dvd'
        );
    }
}
