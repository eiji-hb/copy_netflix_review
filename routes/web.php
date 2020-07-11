<?php

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/', 'homeController@index')->name('root');
Route::get('show/{id}', 'homeController@show')->name('homes.show');
Route::get('movie', 'homeController@movie')->name('homes.movie');
Route::get('series', 'homeController@series')->name('homes.series');
