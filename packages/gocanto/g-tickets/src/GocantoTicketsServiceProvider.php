<?php

namespace Gocanto\gTickets;

use Illuminate\Support\ServiceProvider;

class GocantoTicketsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // echo 'here';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Gocanto\gTickets\Controllers\TicketsController');
    }
}
