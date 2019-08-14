<?php

Route::group(['module' => 'Product', 'middleware' => ['web'], 'namespace' => 'App\Modules\Product\Controllers'], function() {

   Route::get('/gammes', 'ProductController@showGammes')->name('showGammes');
   Route::get('/univers', 'ProductController@showUnivers')->name('showUnivers');
   Route::get('/synthese', 'ProductController@showSynthese')->name('showSynthese');
   Route::get('/parfums', 'ProductController@showParfums')->name('showParfums');
   


});
