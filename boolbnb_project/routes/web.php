<?php

  use Illuminate\Support\Facades\Route;


  Auth::routes();

  Route::get('/', 'apartmentController@index')->name('home');
  Route::get('/apartment/{id}', 'apartmentController@show')->name('apartment');
  Route::get('/edit-apartment/{id}', 'apartmentController@edit')->name('edit-apartment');
