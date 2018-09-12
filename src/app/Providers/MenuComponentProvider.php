<?php

namespace VCComponent\Laravel\Menu\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use VCComponent\Laravel\Menu\Repositories\ItemMenuRepository;
use VCComponent\Laravel\Menu\Repositories\ItemMenuRepositoryEloquent;
use VCComponent\Laravel\Menu\Repositories\MenuRepository;
use VCComponent\Laravel\Menu\Repositories\MenuRepositoryEloquent;

class MenuComponentProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(MenuRepository::class, MenuRepositoryEloquent::class);
        App::bind(ItemMenuRepository::class, ItemMenuRepositoryEloquent::class);
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes.php');
        $this->publishes([
            __DIR__.'/../../migrations/' => database_path('migrations')
        ], 'migrations');
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views')
        ], 'views');
    }
}
