<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* @description validation for check valid email format (axy@test.com) 
         * @return type boolean
         */
        Validator::extend('check_email_format', function ($attribute, $value, $parameters, $validator) {
            $post = request()->all();
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return false;
            } else {
                return true;
            }
        });

        /**
         * @description function for phone number validation
         * @return type boolean
         */
        Validator::extend('phone_format', function ($attribute, $value, $parameters, $validator) {
            if ($value != "") {
                return preg_match("/^(\+\d{1,3}[- ]?)?\d{4,12}$/", $value);
            } else {
                return true;
            }
        });
    }
}
