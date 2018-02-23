<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Admin\Models\Ads;

class SideLeftServiceProveder extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('Site::ads.side_left',function($view){
          $side_left = Ads::where(['status'=>1,'location'=>'Side_Left'])->orderBy('order','ASC')->get();
            $view->with(compact('side_left'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
