<?php

  use Illuminate\Support\Facades\Route;


  Auth::routes();

  Route::get('/', 'apartmentController@index')->name('home');

  Route::get('/show-apartment/{id}', 'apartmentController@show')->name('show-apartment');

  // modifica
  Route::get('/edit-apartment/{id}', 'apartmentController@edit')->name('edit-apartment');
  Route::post('/update-apartment/{id}', 'apartmentController@update')->name("update-apartment");

  // eliminazione
  Route::get('/delete-apartment/{id}', 'apartmentController@delete')->name("delete-apartment");

  // nuovo appartamento
  Route::get('/create-apartment', 'apartmentController@create')->name("create-apartment");
  Route::post('/store-apartment', 'apartmentController@store')->name("store-apartment");
