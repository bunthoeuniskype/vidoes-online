<?php

Route::group(['module' => 'Site', 'middleware' => ['api'], 'namespace' => 'App\Modules\Site\Controllers'], function() {

    Route::get('site', 'SiteController@getHome');
    Route::post('category/site/contact', 'SiteController@contactR');
    Route::get('category/{slug}/site', 'SiteController@getBycategory');
    Route::get('subcategory/{slug}/site', 'SiteController@getBysubcategory');
    
});
