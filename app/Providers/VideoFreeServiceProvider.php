<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Modules\Admin\Models\Post;

class VideoFreeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
       view()->composer('Site::side.video_free',function($view){
         $video_free = Post::where(['language_code'=>App::getLocale(), 'status'=>1,'download_type'=>'free'])->orderBy('group_id','ASC')->limit(3)->get();
            $view->with(compact('video_free'));
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
