<?php

Route::group(['module' => 'Admin', 'middleware' => ['web'], 'namespace' => 'App\Modules\Admin\Controllers'], function() {
	
	Route::group(['middleware' => ['auth']], function() {

    Route::resource('admin/category', 'CategoryController');
    Route::get('admin/category/{id}/delete', 'CategoryController@delete');
    Route::resource('admin/subcategory', 'SubCategoryController');
    Route::get('admin/subcategory/{id}/delete', 'SubCategoryController@delete');
    Route::resource('admin/post', 'PostController');
    Route::get('admin/post/{id}/delete', 'PostController@delete');
    Route::resource('admin/advertisement', 'AdsController');
    Route::resource('admin/videolist', 'VideoListController');
    Route::get('admin/addvideolist/{post_group_id}', 'VideoListController@addvideolist');
    Route::get('admin/videolist/{group_id}/delete', 'VideoListController@delete');
    Route::resource('admin/linkdownload', 'LinkDownloadController');
    Route::get('admin/linkdownload/{id}/delete', 'LinkDownloadController@delete');
    Route::get('admin/addlinkdownload/{post_group_id}', 'LinkDownloadController@addlinkdownload');
    Route::resource('admin/customer', 'CustomerController');   
    Route::get('admin/feedback', 'FeedbackController@index');   

    Route::get('admin/feedback/{id}/view', 'FeedbackController@view');
    
    Route::get('admin/select_sub_category',['uses'=>'SubCategoryController@select_sub_category','as'=>'select_sub_category']);

    });


});
