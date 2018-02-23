<?php

Route::group(['module' => 'Security', 'middleware' => ['web'], 'namespace' => 'App\Modules\Security\Controllers'], function() {

Route::group(['middleware' => ['auth']], function() {
	//Route::resource('user','UserController');
Route::get('user',['as'=>'user.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit']]);
Route::get('user/{id}/edit',['as'=>'user.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
Route::put('user/{id}',['as'=>'user.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
Route::get('user/create',['as'=>'user.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
Route::post('user',['as'=>'user.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);

	//Route::resource('role','RoleController');
Route::get('role',['as'=>'role.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit']]);
Route::get('role/{id}/edit',['as'=>'role.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
Route::put('role/{id}',['as'=>'role.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
Route::get('role/create',['as'=>'role.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
Route::post('role',['as'=>'role.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);

Route::get('setting',['uses'=>'SettingController@index','as'=>'setting.index','middleware' => ['permission:setting']]);
Route::put('setting/{id}',['uses'=>'SettingController@update','as'=>'setting.update','middleware' => ['permission:setting']]);
	
Route::get('security',['uses'=>'SecurityController@index','as'=>'security.index','middleware'=>'permission:security']);	

Route::get('security/{id}/unblock','SecurityController@unblock');
Route::get('security/{id}/block','SecurityController@block');
Route::get('security/{id}/addblock','SecurityController@addblock');
	});
});