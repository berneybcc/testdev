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

// Route::get('/', function () {
//     return view('principal');
// });

Auth::routes();

Route::get('/save', 'ContactController@save')->name('save-contact');
Route::get('/', 'ContactController@index');
Route::get('/list', 'ContactController@ListContact');
Route::get('/selectuser/{id}', 'ContactController@selectUserContact');
Route::get('/delete/{id}', 'ContactController@deleteContact');
Route::get('/update/{id}', 'ContactController@updateContact');

Route::get('/home', 'HomeController@index')->name('home');

