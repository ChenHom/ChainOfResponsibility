<?php

namespace App\Providers;

use Schema;
use App\Guards\TradeGuard;
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
        Schema::defaultStringLength(191);

        defined('ENABLE_ON') ?: define('ENABLE_ON', 1);
        defined('ENABLE_OFF') ?: define('ENABLE_OFF', 0);
        defined('ENABLE_DELETE') ?: define('ENABLE_DELETE', -1);

        /**
         * 商戶角色
         */
        defined('ROLE_CO') ?: define('ROLE_CO', 'CO');
        defined('ROLE_SA') ?: define('ROLE_SA', 'SA');
        defined('ROLE_A') ?: define('ROLE_A', 'A');
        defined('ROLE_M') ?: define('ROLE_M', 'M');

//         \DB::listen(function ($query) {
        //             $sql = $query->sql;
        // //            if(Str::startsWith($sql, 'select ')) {
        //             \Log::info(
        //                 $sql,
        //                 $query->bindings,
        //                 $query->time
        //             );
        // //            }

//         });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->extend('eloquent', function (\Illuminate\Contracts\Foundation\Application $app,
            string $name,
            array $config) {
            $provider = $app['auth']->createUserProvider($config['provider'] ?? null);
            return new TradeGuard($provider, $app->request->client_id);
        });
    }
}
