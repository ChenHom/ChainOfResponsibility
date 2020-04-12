<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ErrorCodeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (config('error-code') as $code => $message) {
            define($code, $code);
        }
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
