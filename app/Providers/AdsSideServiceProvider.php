<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Admin\Models\Ads;

class AdsSideServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('Site::ads.side',function($view){
          $ads_side = Ads::where(['status'=>1,'location'=>'Side'])->orderBy('order','ASC')->get();
            $view->with(compact('ads_side'));
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
