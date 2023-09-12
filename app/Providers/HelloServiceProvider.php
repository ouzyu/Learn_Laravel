<?php

namespace App\Providers;

use App\Http\Validators\HelloValidator;
use Validator;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    public function register(): void
    {
       
    }

    public function boot(): void
    {
        $validator = $this->app['validator'];
        $validator->resolver(function($translator, $data, $rules, $messages) {
            return new HelloValidator($translator, $data, $rules, $messages);
        });
        view()->composer('hello.index', 'App\Http\Composers\HelloComposer');
    }
}
