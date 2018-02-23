<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Admin\Models\Ads;

class AdsBodyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('Site::ads.body',function($view){
        $ads_body = Ads::where(['status'=>1,'location'=>'Body'])->orderBy('order','DESC')->first();
            $view->with(compact('ads_body'));
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
