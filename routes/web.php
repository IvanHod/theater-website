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
	return view('welcome');
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
Route::get('/festival/{id}', 'FestivalController@view');
Route::post('/festival', 'FestivalController@edit');
Route::post('/festival/{id}', 'FestivalController@create');
Route::delete('/festival/{id}', 'FestivalController@delete');
Route::get('/festival/create', 'FestivalController@createForm');

Route::get('/collective', 'CollectiveController@index');
Route::get('/collective/{id}', 'CollectiveController@view');
Route::delete('/collective/{id}', 'CollectiveController@delete');
Route::post('/collective', 'CollectiveController@create');
Route::post('/collective/{id}', 'CollectiveController@edit');
Route::get('/collective/create', 'CollectiveController@createForm');

Route::get('/user', 'UserController@index');
Route::get('/user/{id}', 'UserController@view');
Route::post('/user', 'UserController@create');
Route::post('/user/{id}', 'UserController@edit');
Route::delete('/user', 'UserController@delete');
Route::get('/user/create', 'UserController@createForm');
