<?php

function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}

function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active`=1"), 0);
}

function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1) {
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;
	}
	
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($email) {
	$email = sanitize($email);
	//return (mysql_result(mysql_query("SELECT COUNT (`user_id`) FROM `users` WHERE `email` = '$email'"), 0) == 1) ? true : false;
	
	$email_query = mysql_query("SELECT * FROM `users` WHERE `email` = '$email'");
	
	$email_num = $email_query;	
	
}

function email_exists($username) {
	$username = sanitize($username);
	//return (mysql_result(mysql_query("SELECT COUNT (`user_id`) FROM `users` WHERE `email` = '$email'"), 0) == 1) ? true : false;
	
	$username_query = mysql_query("SELECT * FROM `users` WHERE `username` = '$username'");
	
	$username_num = $username_query;	
	
}

function user_active($email) {
	$email = sanitize($email);
	//return (mysql_result(mysql_query("SELECT COUNT (`user_id`) FROM `users` WHERE `email` = '$email' AND `active`=1"), 0) == 1) ? true : false;	
	
	$email_query = mysql_query("SELECT * FROM `users` WHERE `email` = '$email'");
	$email_row = mysql_fetch_array($email_query);
	
	return $email_row['active'];	
	
	if($email_row == 1){
	return TRUE;
	} else {
	return FALSE;
	}
	
}

function user_id_from_username($email) {
	$email = sanitize($email);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'"), 0, 'user_id');
}

function login($email, $password) {
	$user_id = user_id_from_username($email);
	
	$email = sanitize($email);
	$password = md5($password);
	
	//return (mysql_result(mysql_query("SELECT COUNT (`user_id`) FROM `users` WHERE `email` = '$email' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
	
	$user_query = mysql_query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
	
	$user_num = mysql_num_rows($user_query);
	
	if($user_num == 1){
	return TRUE;
	} else {
	return FALSE;
	}
	
}

?>