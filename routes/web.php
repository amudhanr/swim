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

Route::get('/event/', function () {
	return view('event');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/hosts', 'HostsController'); 

Route::resource('/admin/meets', 'MeetsController'); 

Route::resource('/admin/days', 'DaysController');

Route::resource('/admin/events', 'EventsController');

Route::resource('/admin/heats', 'HeatsController');

Route::resource('/admin/teams', 'TeamsController');

Route::resource('/admin/lanes', 'LanesController');
