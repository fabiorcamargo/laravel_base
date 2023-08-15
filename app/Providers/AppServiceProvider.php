<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ProtoneMedia\Splade\Components\Form\Input;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Input::defaultDateFormat('d-m-Y');
        Input::defaultTimeFormat('H:i');
        Input::defaultDatetimeFormat('d-m-Y H:i');
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }

    
}
