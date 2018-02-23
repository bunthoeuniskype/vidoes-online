<?php

Route::group(['module' => 'Site', 'middleware' => ['web'], 'namespace' => 'App\Modules\Site\Controllers'], function() {

    Route::resource('/', 'SiteController');
    Route::get('videos_detail/{slug}/play','SiteController@videos_detail');

    Route::get('videos_detail/{slug}/plays','SiteController@videos_details');

    Route::post('ratingpost', ['uses'=>'SiteController@ratingPost','as'=>'rating_post']);

    Route::get('category/contact', 'SiteController@contact');
	Route::get('category/home', 'SiteController@index');

	Route::get('category/{slug}', 'SiteController@category');
	Route::get('categoryvideomore/{slug}', 'SiteController@categoryvideomore');	
	Route::get('videofree', 'SiteController@videofree');
	Route::get('videofreemore', 'SiteController@videofreemore');
	Route::get('lastvideo', 'SiteController@lastvideo');
	Route::get('lastvideomore', 'SiteController@lastvideomore');	
	Route::get('subcategory/{slug}', 'SiteController@subcategory');
	Route::get('subcategoryvideomore/{slug}', 'SiteController@subcategoryvideomore');
	Route::get('search', 'SiteController@search');
	Route::post('feedback', 'SiteController@feedback');

	Route::get('/customer/register', function()
	{
		return view('Site::register');
	});

	Route::get('/customer/login', function()
	{
		return view('Site::login');
	});

	Route::post('customer/register', 'CustomerController@register');
	Route::post('customer/login', 'CustomerController@login');
	Route::get('customer/logout', 'CustomerController@logout');
	Route::get('verify/{verify}', 'CustomerController@verify');
	Route::get('customer/profile', 'CustomerController@profile');
	Route::post('update_customer_profile',['uses'=>'CustomerController@update','as'=>'update_customer_profile']);

	Route::get('comment_get', 'CommentController@getComment');
	Route::get('comment_get_all', 'CommentController@getCommentAll');
	Route::get('comment_post', 'CommentController@postComment');

	Route::get('download/{slug}/resource', 'SiteController@downloadResource');
	Route::get('download/{slug}/file', 'SiteController@downloadFile');
	
});
