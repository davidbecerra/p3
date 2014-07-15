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

	if (!empty($_GET)) {
		// Clean form input
		$paragraphs = trim($_GET['paragraphs']);
		$paragraphs = stripslashes($paragraphs);
		$paragraphs = htmlspecialchars($paragraphs);

		// // Ensure paragraphs is integer
		if (is_numeric($paragraphs) && $paragraphs <= 99 && $paragraphs > 0) {
			$paragraphs = (int) $paragraphs;
			$generator = new Badcow\LoremIpsum\Generator();
			$output = implode('<p>', $generator->getParagraphs($paragraphs));
		}
		else
			$output = '';
	}
	else
		$output = '';
	return View::make('ipsum')->with('output', $output);
});

// Random User Generator
Route::get('/rand-user', function() {
	return View::make('rand_user');
});

