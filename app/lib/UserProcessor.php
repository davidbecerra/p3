<?php

// Class that encapsulates the logic behind generating random user data
class UserProcessor {
	// -------------
	// Properties -- only accessible directly within class
	// -------------
	private $num_users; 
	private $options; //includes optional data to be generated for user. Only user name is done by default

	// ---------
	// Methods
	// ---------

	public function __construct($num_users) {
		$this->set_users($num_users);
	}

	public function set_users($n_users) {
		$this->num_users = $n_users;
	}

	public function set_options($opts) {
		$this->options = $opts;
	}

	public function generate_users() {
		$fake_user = Faker\Factory::create();
		$output = '';

		// Generate $num_users random users with optional features (address, bio text, etc.)
		for ($i=0; $i < $this->num_users; $i++) { 
			$output .= "<br><b>Name:</b> " . $fake_user->name . "<br>";
			if (isset($this->options['addr']) && $this->options['addr'])
				$output .= "<b>Address: </b>" . $fake_user->address . "<br>";
			if (isset($this->options['bio']) && $this->options['bio'])
				$output .= "<b>Bio: </b>" . $fake_user->text . "<br>";
		}
		return $output;
	}
}

?>