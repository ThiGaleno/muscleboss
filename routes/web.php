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

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin-index');
Route::post('/admin/register', 'AdminController@store')->name('admin-store');
Route::get('/admin/form/{id?}', 'AdminController@create')->name('admin-create');
Route::post('/admin/edit/{id}', 'AdminController@update')->name('admin-edit');
Route::get('/admin/delete/{id}', 'AdminController@destroy')->name('admin-delete');

Route::get('/client', 'ClientController@index')->name('client-index');
Route::post('/client/register', 'ClientController@store')->name('client-store');
Route::get('/client/form/{id?}', 'ClientController@create')->name('client-create');
Route::post('/client/edit/{id}', 'ClientController@update')->name('client-edit');
Route::get('/client/delete/{id}', 'ClientController@destroy')->name('client-delete');
