<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        define('ENABLE_ON', 1);
        define('ENABLE_OFF', 0);
        define('ENABLE_DELETE', -1);

        /**
         * 商戶角色
         */
        define('ROLE_CO', 'CO');
        define('ROLE_SA', 'SA');
        define('ROLE_A', 'A');
        define('ROLE_M', 'M');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
