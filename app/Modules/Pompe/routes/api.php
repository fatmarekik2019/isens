<?php

Route::group(['module' => 'Pompe', 'middleware' => ['api'], 'namespace' => 'App\Modules\Pompe\Controllers'], function() {

    Route::resource('Pompe', 'PompeController');

});
