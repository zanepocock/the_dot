<?php

//------------------------------Created By Zane Pocock @ www.thedot.co.nz---------------------------

session_start(); // Must start session first thing

// See if they are a logged in member by checking Session data

if (isset($_SESSION['id'])) {
	// Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $email = $_SESSION['email'];
	include_once "sidebar_personal_profile.php";
	
	} else {

		include_once "login.php"; 
	
	}
?>


<?php

//include_once "checkuserlog.php";

//{

//if ("return_msg=not_logged_in") {

//     include_once "login.php"; 
     
//	} else {
	
//		include_once "sidebar_personal_profile.php";
		
//	}
	
//	}

?>