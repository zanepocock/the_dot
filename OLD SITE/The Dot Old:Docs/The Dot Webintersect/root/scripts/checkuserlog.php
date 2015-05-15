<?php
session_start();
if ($_POST['post_code'] == "check_log") {

	if (!isset($_SESSION['id'])) { 

          if (!isset($_COOKIE['idCookie'])) {  
  
               print "return_msg=not_logged_in";
	           exit();
	 
          }
	 
	}

    // connect to DB to update last visit day
    include_once "connect_to_mysql.php";

    // If session ID is set for logged in user
	// The regular session expires by default every time the user closes their browser down
	// If that is the case this section will not run and the section below for recognizing set cookies will run
    if (isset($_SESSION['id'])) { 

    $id = $_SESSION['id'];
    $firstname = $_SESSION['firstname'];
    print "id=$id&member_name=$firstname";

    exit();

    }
	
    // If cookies are set, but no session ID is set yet, we set it below and update the last_log_date field in database
    if (isset($_COOKIE['idCookie'])) {

    $id = $_COOKIE['idCookie'];
    $firstname = $_COOKIE['firstnameCookie'];
    $email = $_COOKIE['emailCookie'];
    $pass = $_COOKIE['passCookie'];
    // Register the session vars just like we do in the login form
    session_register('id');
    $_SESSION['id'] = $id;
    session_register('firstname');
    $_SESSION['firstname'] = $firstname;
    session_register('email');
    $_SESSION['email'] = $email;
    session_register('pass');
    $_SESSION['pass'] = $pass;
    // Access the value of these two session variables for use in sql statement below 
	// and also for sending these two vars into the flash header for use and display
    $id = $_SESSION['id'];
    $firstname = $_SESSION['firstname'];

    ///////////          Update Last Log Date Field Or not         /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Check last visit date does not equal today
    $sql1 = mysql_query("SELECT last_log_date FROM myMembers WHERE id='$id'"); 
    while($row = mysql_fetch_array($sql1)){ 
    	$last_log_date = $row["last_log_date"];
    }
    // This sets today's date format that will be matching that of the var below coming from mysql
    $today = date("Y-m-d");
    // this makes the date the same format as the today date var format for easy comparison of the two
    $last_log_date = strftime("%Y-%m-%d", strtotime($last_log_date));
    if ($last_log_date != $today) {
          mysql_query("UPDATE myMembers SET last_log_date=now() WHERE id='$id'"); 
    }
    ///////////          END Update Last Log Date Field Or not         ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Print to flash
    print "id=$id&member_name=$firstname";

    exit();

    } // close the if (isset($_COOKIE['firstnameCookie'] section

} // close first if statement  - $_POST['post_code'] == "check_log"
?>


<?php
// ************************ This is the original check user log script WITHOUT the REMEMBER ME feature, for you to reference ****************************
/*
session_start();

if ($_POST['post_code'] == "check_log") {

     if (!isset($_SESSION['id'])) { 

          print "return_msg=not_logged_in";

     } else {

          $id = $_SESSION['id'];
          $firstname = $_SESSION['firstname'];
          print "member_id=$id&member_name=$firstname";

          exit();

     }

} // close first if statement
*/
?>