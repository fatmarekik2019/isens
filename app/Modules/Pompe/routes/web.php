<?php

Route::group(['module' => 'Pompe', 'middleware' => ['web'], 'namespace' => 'App\Modules\Pompe\Controllers'], function() {

    Route::get('pumps', 'PompeController@showPumps')->name('showPumps');
    Route::get('pumps-list', 'PompeController@pumpsList')->name('pumpsList');

});
