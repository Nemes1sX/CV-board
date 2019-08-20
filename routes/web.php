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

Route::get('/create', 'CvController@createcv')->name('create.cv');
Route::get('/','CvController@index')->name('index.cv');
Route::get('/show/{id}', 'CvController@show')->name('show.cv');
Route::get('/filter', 'CvController@filter')->name('filter.cv');
Route::post('/create', 'CvController@store')->name('store.cv');