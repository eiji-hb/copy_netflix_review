<?php

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('root');
Route::get('show/{id}', 'HomeController@show')->name('homes.show');
Route::get('movie', 'HomeController@movie')->name('homes.movie');
Route::get('series', 'HomeController@series')->name('homes.series');
