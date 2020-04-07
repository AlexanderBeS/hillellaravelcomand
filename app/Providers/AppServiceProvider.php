<?php

namespace App\Providers;

use App\Service\StatService;
use App\Service\StatServiceInterface;
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
        $this->app->bind(StatServiceInterface::class, StatService::class);
    }
}
