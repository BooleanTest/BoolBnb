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

// TODO:
  // ricerca appartamento
  // Route::post('/search-apartment', 'apartmentController@search')->name("search-apartment");

  // profilo utente
  Route::get('/profilo_utente/{id}', 'profiloController@profilo')->name('profilo');

  // statistiche appartamento
  Route::get('/stats_apartment/{id}', 'profiloController@stats')->name('stats');

  // invio messaggio
  Route::post('/store-messagge/{id}', 'apartmentController@messagges')->name('store-messagge');

  Route::get('/view-messagge/{id}', function () {
    return view('view-messagge');
  });


  Route::any('/search', 'apartmentController@search')->name('search');
