<?php

function clean_input($input) {
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

function validate_input_number($input, $min, $max) {
	return (is_numeric($input) && $input <= $max && $input >= $min);
}

// Homepage
Route::get('/', function()
{
	return View::make('index');
});

// Lorem-ipsum Generator
Route::get('/lorem-ipsum', function() {

	if (!empty($_GET)) {
		// Scrub form input
		$paragraphs = clean_input($_GET['paragraphs']);

		// Ensure paragraphs is integer
		if (validate_input_number($paragraphs, 1, 99)) {
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
	$output = '';
	if (!empty($_GET)) {
		$num_users = clean_input($_GET['users']);

		if (validate_input_number($num_users, 1, 9)) {
			$num_users = (int) $num_users;
			$fake_user = Faker\Factory::create();
			for ($i=0; $i < $num_users; $i++) { 
				$output .= $fake_user->name . "<br>";
				$output .= $fake_user->address . "<br>";
				$output .= $fake_user->text . "<br>";
			}
		}
	}
	return View::make('rand_user')->with('user_data', $output);
});

