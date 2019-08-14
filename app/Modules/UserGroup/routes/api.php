<?php

Route::group(['module' => 'UserGroup', 'middleware' => ['api'], 'namespace' => 'App\Modules\UserGroup\Controllers'], function() {

    Route::resource('User_Group', 'UserGroupController');

});
