<?php

namespace App\Providers;

use App\Repositories\Device\DeviceRepository;
use App\Repositories\Device\DeviceRepositoryInterface;
use App\Repositories\Purchase\PurchaseRepository;
use App\Repositories\Purchase\PurchaseRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
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
        $this->app->bind(DeviceRepositoryInterface::class,DeviceRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(PurchaseRepositoryInterface::class,PurchaseRepository::class);
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
