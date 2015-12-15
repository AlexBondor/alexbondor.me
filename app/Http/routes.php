<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');

// Dashboard
Route::get('/dashboard', 'AdminController@dashboard');

Route::get('/dashboard/images', 'AdminController@images');

Route::get('/dashboard/new-entry', 'AdminController@newEntry');
Route::post('/dashboard/new-entry', 'AdminController@addEntry');

// Services
// File upload/remove
Route::post('/service/file-upload', 'AdminController@uploadFile');
Route::post('/service/file-remove', 'AdminController@removeFile');
// Parsedown
Route::get('/service/parsedown', 'AdminController@parsedownEntry');
// Entries
Route::post('/service/entry-remove', 'AdminController@removeEntry');

Route::get('/error', function()
{
    return View::make('errors/503');
});
