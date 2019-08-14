<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

   Route::get('/register', 'UserController@showRegister')->name('showRegister');
   Route::post('/register', 'UserController@handleCreateUser')->name('handleCreateUser');
   Route::post('/login', 'UserController@handleUserLogin')->name('handleUserLogin');
   Route::get('/user/logout', 'UserController@handleLogout')->name('handleLogout');
   Route::get('/user/change_password','UserController@showChangePassword')->name('showChangePassword');
   Route::post('/user/change_password','UserController@handleChangePassword')->name('handleChangePassword');
   Route::get('/user/lost_password','UserController@showLostPassword')->name('showLostPassword');
   Route::post('/user/lost_password','UserController@handleLostPassword')->name('handleLostPassword');
   Route::get('/user/reset_password/{email}/{timestamp}/','UserController@handleResetPassword')->name('handleResetPassword');

   Route::get('/user/admin/','UserController@showAdminHome')->name('showAdminHome');
   Route::get('/user/admin/account','UserController@showAccount')->name('showAccount');
   Route::get('/user/add_user','UserController@showAddUser')->name('showAddUser');
   Route::get('/user/resume_user','UserController@showUser')->name('showUser');
   Route::get('/user/association','UserController@showAssociation')->name('showAssociation');
});
