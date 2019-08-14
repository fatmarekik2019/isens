<?php

Route::group(['module' => 'Commande', 'middleware' => ['web'], 'namespace' => 'App\Modules\Commande\Controllers'], function() {

   Route::get('/user/backOrder', 'CommandeController@showBackOrder')->name('showBackOrder');
   Route::get('/user/InvoiceOrder', 'CommandeController@showInvoiceOrder')->name('showInvoiceOrder');



});
