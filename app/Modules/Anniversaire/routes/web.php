<?php

Route::group(['module' => 'Anniversaire', 'middleware' => ['web'], 'namespace' => 'App\Modules\Anniversaire\Controllers'], function() {

    Route::get('User/Diffuser/Anniversaires', 'AnniversaireController@showAnniversaires')->name('showAnniversaires');

});
