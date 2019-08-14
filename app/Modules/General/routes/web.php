<?php

Route::group(['module' => 'General', 'middleware' => ['web'], 'namespace' => 'App\Modules\General\Controllers'], function() {

   Route::get('/', 'GeneralController@showHome')->name('showHome');
   Route::get('/faq', 'GeneralController@showFaq')->name('showFaq');

});
