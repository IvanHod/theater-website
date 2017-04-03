<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
	$news = \App\Models\News::all();
	$festivals = \App\Models\Festival::all();
	return view('welcome', array('news' => $news, 'festivals' => $festivals));
});

Route::get('/new', 'NewController@index');
Route::group(['middleware' => 'auth'], function() {
	Route::get('/new/edit', 'NewController@createForm');
	Route::get('/new/edit/{id}', 'NewController@createForm');
	Route::post('/new', 'NewController@create');
	Route::post('/new/{id}', 'NewController@edit');
	Route::delete('/new/{id}', 'NewController@delete');
});
Route::get('/new/{id}', 'NewController@view');

Route::get('/festival', 'FestivalController@index');
Route::group(['middleware' => 'auth'], function() {
	Route::get('/festival/edit', 'FestivalController@createForm');
	Route::get('/festival/edit/{id}', 'FestivalController@createForm');
	Route::post('/festival', 'FestivalController@create');
	Route::post('/festival/{id}', 'FestivalController@edit');
	Route::delete('/festival/{id}', 'FestivalController@delete');
});
Route::get('/festival/{id}', 'FestivalController@view');

Route::get('/collective', 'CollectiveController@index');
Route::get('/collective/edit', 'CollectiveController@createForm');
Route::get('/collective/edit/{id}', 'CollectiveController@createForm');
Route::post('/collective', 'CollectiveController@create');
Route::group(['middleware' => 'auth'], function() {
	Route::post('/collective/{id}', 'CollectiveController@edit');
	Route::delete('/collective/{id}', 'CollectiveController@delete');
});
Route::get('/collective/{id}', 'CollectiveController@view');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/user', 'UserController@index');
	Route::get('/user/edit', 'UserController@createForm');
	Route::get('/user/edit/{id}', 'UserController@createForm');
	Route::post('/user', 'UserController@create');
	Route::post('/user/{id}', 'UserController@edit');
	Route::delete('/user/{id}', 'UserController@delete');
	Route::get('/user/{id}', 'UserController@view');
});

Route::get('/about-us', function () {
	return view('about_ud');
});
