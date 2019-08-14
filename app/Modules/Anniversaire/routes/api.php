<?php

Route::group(['module' => 'Anniversaire', 'middleware' => ['api'], 'namespace' => 'App\Modules\Anniversaire\Controllers'], function() {

    Route::resource('Anniversaire', 'AnniversaireController');

});
