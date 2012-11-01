<?php

include 'core/init.php';

if(empty($_POST) === false) {
		$required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
		foreach ($_POST as $key => $value) {
			if (empty($value) && in_array($key, $required_fields) === true) {
				$errors[] = 'Fields marked with an asterisk are required.';
				break 1;
			}
		}
		
		if (empty($errors) === true) {
			if (user_exists($_POST['username']) === true) {
			$errors[] = 'Sorry, the username \''. $_POST['username'] .'\' is already taken.';
			}
			if(preg_match('/\\s/', $_POST['username']) == true){
				$errors[] = 'Your username must not contain any spaces.';
			}
			if(strlen($_POST['password']) < 6){
				$errors[] = 'Your password must be at least 6 characters.';
			}
			if ($_POST['password'] !== $_POST['password_again']) {
			$errors[] = 'Your passwords do not match.';
			}
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'A valid email address is required.';
			}
			if (email_exists($_POST['email']) === true) {
				$errors[] = 'Sorry, the email \''. $_POST['email'] .'\' is already taken.';
			}
		}
}

include 'includes/overall/header.php';

if (empty($_POST) === true && empty($errors) === true) {
	// register user
} else {
	echo output_errors($errors);
}

include 'includes/overall/footer.php';

?>