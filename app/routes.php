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
	$output = '';

	$paragraphs = Input::get('paragraphs', 0);
	// Scrub form input
	$paragraphs = clean_input($paragraphs);

	// Ensure paragraphs is integer
	if (validate_input_number($paragraphs, 1, 99)) {
		// Generate Lorem Ipsum paragraphs
		$paragraphs = (int) $paragraphs;
		$generator = new Badcow\LoremIpsum\Generator();
		$output = '<p>' . implode('</p><p>', $generator->getParagraphs($paragraphs)) . '</p>';
	}
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
		// Create & Init. UserProcessor class to generate random users
		$user_proc = new UserProcessor((int) $num_users);
		$user_proc->set_options($options);
		$output = $user_proc->generate_users();
	}
	return View::make('rand_user')->with('user_data', $output);
});

