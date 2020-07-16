<?php

// Route::get('/', function () {
//   return view('welcome');
// });
# home
Route::get('/', 'homecontroller@index')->name('root');
Route::get('show/{id}', 'homecontroller@show')->name('homes.show');
Route::get('movie', 'homecontroller@movie')->name('homes.movie');
Route::get('series', 'homecontroller@series')->name('homes.series');

# post
Route::prefix('post')->group(function () {
  Route::get('index','PostController@index')->name('post.index');
});
Route::group(['prefix' => 'post', 'middleware' => 'auth'], function(){
  Route::get('create/{id}', 'PostController@create')->name('post.create');
  Route::post('store', 'PostController@store')->name('post.store');
  Route::get('show/{id}', 'PostController@show')->name('post.show');
  Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
  Route::post('update/{id}', 'PostController@update')->name('post.update');
  Route::post('destroy/{id}', 'PostController@destroy')->name('post.destroy');
});


Auth::routes();
Route::get('home', 'homecontroller@index');