<?php

Route::group(['module' => 'Diffuser', 'middleware' => ['web'], 'namespace' => 'App\Modules\Diffuser\Controllers'], function() {

    Route::get('diffuseurs', 'DiffuserController@showDiffuser')->name('showDiffuser');
    Route::get('diffuseurs-list', 'DiffuserController@diffusersList')->name('diffusersList');
    Route::get('diffuseurs-details/{IdDiffuser}', 'DiffuserController@showDiffuserHistory')->name('showDiffuserHistory');
    Route::get('anniversaires', 'DiffuserController@showAnniversaires')->name('showAnniversaires');
    Route::get('anniversaires-list', 'DiffuserController@anniversairesList')->name('anniversairesList');
    Route::get('/user/SAV', 'DiffuserController@showSav')->name('showSav');
    Route::get('diffuseurs-details/{IdDiffuser}', 'DiffuserController@showDiffuserHistory')->name('showDiffuserHistory');
});
