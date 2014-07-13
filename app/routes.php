<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Homepage
Route::get('/', function()
{
	return View::make('index');
});

// Lorem-ipsum Generator
Route::get('/lorem-ipsum', function() {
	return View::make('ipsum');
});

// Random User Generator
Route::get('/rand-user', function() {
	return View::make('rand_user');
});

