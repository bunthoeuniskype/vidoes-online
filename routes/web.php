<?php


Route::post('/locale', array(
    'Middleware' => 'LanguagesMiddleware',
    'uses' => 'LanguageController@index'
     ));
Route::get('/locale', array(
    'Middleware' => 'LanguagesMiddleware',
    'uses' => 'LanguageController@index'
     ));

Route::group(['middleware' => ['web']], function () {

Route::get('login',['uses'=>'Auth\UserController@viewsignin', 'as'=>'login']);
Route::get('sys_login','Auth\UserController@viewsignin');
Route::post('sys_signin','Auth\UserController@signin');
Route::get('sys_logout','Auth\UserController@signout');


});


//Auth::routes();

Route::group(['middleware' => ['auth']], function() {
	Route::get('admin/dashboard','DashboardController@index');
	Route::get('administrator','DashboardController@index');
});




