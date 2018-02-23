<?php

Route::group(['module' => 'Security', 'middleware' => ['web'], 'namespace' => 'App\Modules\Security\Controllers'], function() {

Route::group(['middleware' => ['auth']], function() {
	//Route::resource('user','UserController');
Route::get('admin/user',['as'=>'user.index','uses'=>'UserController@index']);
Route::get('admin/user/{id}/edit',['as'=>'user.edit','uses'=>'UserController@edit']);
Route::put('admin/user/{id}',['as'=>'user.update','uses'=>'UserController@update']);
Route::get('admin/user/create',['as'=>'user.create','uses'=>'UserController@create']);
Route::post('admin/user',['as'=>'user.store','uses'=>'UserController@store']);

	//Route::resource('role','RoleController');
Route::get('role',['as'=>'role.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit']]);
Route::get('role/{id}/edit',['as'=>'role.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
Route::put('role/{id}',['as'=>'role.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
Route::get('role/create',['as'=>'role.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
Route::post('role',['as'=>'role.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);

Route::get('admin/setting',['uses'=>'SettingController@index','as'=>'setting.index']);
Route::put('admin/setting/{id}',['uses'=>'SettingController@update','as'=>'setting.update']);
	
Route::get('admin/security',['uses'=>'SecurityController@index','as'=>'security.index','middleware'=>'permission:security']);	

Route::get('admin/security/{id}/unblock','SecurityController@unblock');
Route::get('admin/security/{id}/block','SecurityController@block');
Route::get('admin/security/{id}/addblock','SecurityController@addblock');
Route::get('admin/history',['uses'=>'HistoryController@index','as'=>'security.index']);	
Route::get('admin/backupdb',['uses'=>'BackupController@index','as'=>'backup.index']);	

	});

	

});