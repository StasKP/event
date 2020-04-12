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

Route::get('/', 'RoleController@index');
Route::get('/ok_register', 'Auth\RegisterController@index');
Route::get('/admin', 'AdminController@index')->middleware('auth');;
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::post('/section/store', 'SectionController@store')->middleware('auth');
Route::get('/section', 'SectionController@index')->middleware('auth');
Route::get('/event', 'EventController@index')->middleware('auth');
Route::get('/event_add/{event}', 'EventController@add_manager')->middleware('auth');
Route::post('/event_add/{event}', 'EventController@manager_add')->middleware('auth');
Route::get('/section/event/{section}', 'SectionController@add_event')->middleware('auth');
Route::get('/section/theme/{section}', 'SectionController@add_theme')->middleware('auth');


