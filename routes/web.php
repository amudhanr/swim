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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/meets-info/', function () {
	return view('meets-info');
});

Route::get('/meets/m/{meet_id}', ['uses' => 'EventsController@index']);

Route::get('/event/', function () {
	return view('event');
});

Route::get('/event1/', function () {
	return view('event1');
});

Route::get('/event2/', function () {
	return view('event2');
});

Route::get('/event3/', function () {
	return view('event3');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/hosts', 'HostsController'); 

Route::resource('/admin/meets', 'MeetsController');
//Route::resource('/admin/meets', 'MeetsController'); 

//Route::resource('/admin/days', 'DaysController');
//
//Route::resource('/admin/events', 'EventsController');
//
//Route::resource('/admin/heats', 'HeatsController');
//
//Route::resource('/admin/teams', 'TeamsController');
//
//Route::resource('/admin/lanes', 'LanesController');

Route::get('/uploadfile','UploadFileController@index');

Route::post('/uploadfile','UploadFileController@showUploadFile');

Auth::routes();
