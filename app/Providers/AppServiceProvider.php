<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\WebSetting;
use App\Models\Artist\Artist_category;
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
        
        view()->composer('*', function($view){
            $websetting = WebSetting::find(1);
            $view->with('websetting',$websetting);
        });  
  
    }
}
