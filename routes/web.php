<?php

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/', 'homecontroller@index')->name('root');
Route::get('show/{id}', 'homecontroller@show')->name('homes.show');
Route::get('movie', 'homecontroller@movie')->name('homes.movie');
Route::get('series', 'homecontroller@series')->name('homes.series');
