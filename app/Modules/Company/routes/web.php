<?php

Route::group(['module' => 'Company', 'middleware' => ['web'], 'namespace' => 'App\Modules\Company\Controllers'], function() {

	Route::get('/user/Add_Company','CompanyController@showAddCompany')->name('showAddCompany');
    Route::get('/user/Companies','CompanyController@showCompanies')->name('showCompanies');

});
