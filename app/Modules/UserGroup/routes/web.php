<?php

Route::group(['module' => 'UserGroup', 'middleware' => ['web'], 'namespace' => 'App\Modules\UserGroup\Controllers'], function() {

    Route::resource('User_Group', 'UserGroupController');

});
