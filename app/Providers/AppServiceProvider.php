<?php

namespace App\Providers;

use App\Facades\MenuRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('menus')) {
            view()->share('menus', MenuRepository::menuForTree());
        }
        //$this->fooValidator();
    }

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
     * 自定义表单验证规则
     *
     * @return boolean
     */
    //*
    public function fooValidator()
    {
        Validator::extend('is_route', function($attribute, $value, $parameters, $validator) {
            try{
                route($value);
            } catch (\Exception $e){
                return false;
            }
            return true;
        });
    }
    //*/
}
