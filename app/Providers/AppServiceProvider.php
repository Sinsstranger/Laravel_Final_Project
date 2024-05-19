<?php

namespace App\Providers;

use App\Services\Interfaces\PropertyInterface;
use App\Services\Interfaces\StoreImage;
use App\Services\Interfaces\UserInterface;
use App\Services\PropertiesServices;
use App\Services\StoreImageService;
use App\Services\UsersServices;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PropertyInterface::class, PropertiesServices::class);
        $this->app->bind(UserInterface::class, UsersServices::class);
        $this->app->bind(StoreImage::class, StoreImageService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
