<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ImogenServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path(). '/Helpers/ImogenDyer.php'; 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
