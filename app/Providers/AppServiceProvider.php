<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Validator;
use App\User;
use DB;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

      
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
