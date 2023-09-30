<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('content_required', function ($attribute, $value, $parameters, $validator) {
            // Check if the content contains only whitespace characters or is empty
            return !empty(strip_tags($value)); //daca continutul fara taguri e empty = false, populat = true.
        });

    }
}
