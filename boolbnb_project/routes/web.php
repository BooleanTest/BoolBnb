<?php

  use Illuminate\Support\Facades\Route;

  Auth::routes();

  Route::get('/', 'apartmentController@index')->name('home');

  Route::get('/show-apartment/{id}', 'apartmentController@show')->name('show-apartment');

  // modifica
  Route::get('/edit-apartment/{id}', 'profiloController@edit')->name('edit-apartment');
  Route::post('/update-apartment/{id}', 'profiloController@update')->name("update-apartment");

  // eliminazione
  Route::get('/delete-apartment/{id}', 'profiloController@delete')->name("delete-apartment");

  // nuovo appartamento
  Route::get('/create-apartment', 'profiloController@create')->name("create-apartment");
  Route::post('/store-apartment', 'profiloController@store')->name("store-apartment");

  // profilo utente
  Route::get('/profilo_utente/{id}', 'profiloController@profilo')->name('profilo');

  // statistiche appartamento
  Route::get('/stats_apartment/{id}', 'profiloController@stats')->name('stats');

  // messaggi
  Route::post('/store-messagge/{id}', 'apartmentController@messagges')->name('store-messagge');
  Route::get('/view-messagges/{id}' , 'profiloController@view')->name('view-messagges');
  // cerca
  Route::any('/search', 'apartmentController@search')->name('search');

  // pagamenti
  Route::get('/apartment/{id}/payment', 'apartmentController@payment')->name('payment');
  // pagamenti --o post--
  Route::get('/payment/paid', 'apartmentController@paid')->name('payment-paid');
  // rotta visibility
  Route::get('/profilo_utente_vis/{id}', 'profiloController@visibility')->name('visibility');
