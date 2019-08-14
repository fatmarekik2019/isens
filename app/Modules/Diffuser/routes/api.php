<?php

Route::group(['module' => 'Diffuser', 'middleware' => ['api'], 'namespace' => 'App\Modules\Diffuser\Controllers'], function() {

    Route::resource('Diffuser', 'DiffuserController');

});
