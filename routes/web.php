<?php

Route::get('/', function () {
  return view('welcome');
});

Route::get('index', 'HomeController@index')->name('root');
Route::get('show/{id}', 'HomeController@index')->name('home.show');
Route::get('movie', 'HomeController@index')->name('home.movie');
Route::get('series', 'HomeController@index')->name('home.series');
