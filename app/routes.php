<?php

// Scrubs $input; protects from attacks
function clean_input($input) {
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

// Ensures $input is number in set [$min, $max]
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

	// Retrieve input
	$num_users = Input::get('users', 0);
	$options = Input::except('users');

	// Scrub and validate text input
	$num_users = clean_input($num_users);
	if (validate_input_number($num_users, 1, 9)) {
		$num_users = (int) $num_users;
		$fake_user = Faker\Factory::create();
		// Generate $num_users random users with optional features (address, bio text, etc.)
		for ($i=0; $i < $num_users; $i++) { 
			$output .= $fake_user->name . "<br>";
			if (isset($options['addr']) && $options['addr'])
				$output .= $fake_user->address . "<br>";
			if (isset($options['bio']) && $options['bio'])
				$output .= $fake_user->text . "<br>";
		}
	}
	return View::make('rand_user')->with('user_data', $output);
});

