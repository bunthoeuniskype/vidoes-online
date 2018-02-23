<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Admin\Models\Ads;
use App\Modules\Security\Models\Setting;

class AdsFooterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('Site::ads.footer',function($view){
     $ads_foot = Ads::where(['status'=>1,'location'=>'Bottom'])->orderBy('order','asc')->get();    
            $view->with(compact('ads_foot'));
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
