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
            'Livro',
            'App\Models\Collections\Livro'
        );

        $this->app->bind(
            'Cd',
            'App\Models\Collections\Cd'
        );

        $this->app->bind(
            'Dvd',
            'App\Models\Collections\Dvd'
        );
    }
}
