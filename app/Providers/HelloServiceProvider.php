<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    public function register(): void
    {
       
    }

    public function boot(): void
    {
        view()->composer('hello.index', 'App\Http\Composers\HelloComposer');
    }
}
