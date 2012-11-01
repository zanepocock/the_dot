<?php

include 'core/init.php';


if (empty($_POST) === false) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (empty($email) === true || empty($password) === true) {
	
		$errors[] = 'You need to enter your email and password';
		
		} else if (user_exists($email) === false) {
		
		$errors[] = 'We can\'t find that email in our database. Have you registered?';	
	
	} else if (user_active($email) === false) {
		
		$errors[] = 'You haven\'t activated your account';	
		
	} else {
	
		if (strlen($password) > 32) {
			$errors[] = 'That password is too long';
		}
	
		$login = login($email, $password);
		if ($login === false) {
			$errors[] = 'That username/password combination is incorrect';
			
	}	else {
			$_SESSION['user_id'] = $login; //login returns user id
			header('Location: index.php');//logs us in and takes us back to index using session to browse
			exit();
		}
	}
} else {
	$errors[] = 'No Data Received';
}


include 'includes/overall/header.php';

if (empty($errors) === false) {
?>
	<h1>We tried to log you in, but...</h1>	
<?php 
	echo output_errors($errors);	
}

include 'includes/overall/footer.php';

?>