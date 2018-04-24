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
	return view('meets.index');
});

Route::get('/meets/{meet_id}', ['uses' => 'EventsController@index']);
Route::get('/event/{event_id}', ['uses' => 'EventsController@event']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/hosts', 'HostsController'); 

Route::resource('/admin/meets', 'MeetsController');

Route::resource('/admin/days', 'DaysController'); 

Route::get('/uploadfile','UploadFileController@index');

Route::post('/uploadfile','UploadFileController@showUploadFile');

Route::post('ajax', 'UploadfileController@ajax');

Auth::routes();
