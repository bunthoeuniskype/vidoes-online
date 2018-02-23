<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Admin\Models\Ads;
use App\Modules\Security\Models\Setting;

class AdsHeaderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('Site::ads.header',function($view){
     $ads_header = Ads::where(['status'=>1,'location'=>'Header'])->orderBy('order','DESC')->first();
     $setting = Setting::select(['logo'])->where(['status'=>1])->first();
            $view->with(compact('ads_header','setting'));
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
