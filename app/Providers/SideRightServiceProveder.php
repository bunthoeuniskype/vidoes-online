<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Admin\Models\Ads;

class SideRightServiceProveder extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer('Site::ads.side_right',function($view){
          $side_right = Ads::where(['status'=>1,'location'=>'Side_Right'])->orderBy('order','ASC')->get();
            $view->with(compact('side_right'));
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
