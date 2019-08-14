<?php

Route::group(['module' => 'Commande', 'middleware' => ['api'], 'namespace' => 'App\Modules\Commande\Controllers'], function() {

    Route::resource('Commande', 'CommandeController');

});
