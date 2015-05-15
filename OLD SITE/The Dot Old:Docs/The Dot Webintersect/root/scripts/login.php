<?php
if ($_POST['email'] != "") {

include_once "connect_to_mysql.php";

$email = $_POST['email'];
$pass = $_POST['pass'];
$remember = $_POST['remember']; // Added for the remember me feature

$email = strip_tags($email);
$pass = strip_tags($pass);
$email = mysql_real_escape_string($email);
$pass = mysql_real_escape_string($pass);
$email = eregi_replace("`", "", $email);
$pass = eregi_replace("`", "", $pass);

$pass = md5($pass);

//make query
$sql = mysql_query("SELECT * FROM myMembers WHERE email='$email' AND password='$pass' AND email_activated='1'"); 
$login_check = mysql_num_rows($sql);

if($login_check > 0){ 

    while($row = mysql_fetch_array($sql)){ 

        $id = $row["id"];   
        session_register('id'); 
        $_SESSION['id'] = $id;
       
	    $firstname = $row["firstname"];   
        session_register('firstname'); 
        $_SESSION['firstname'] = $firstname;
       
	    $email = $row["email"];   
        session_register('email'); 
        $_SESSION['email'] = $email;
         
        mysql_query("UPDATE myMembers SET last_log_date=now() WHERE id='$id'"); 
          
    } // close while
	
    // Remember Me Section Addition... if member has chosen to be remembered in the system
    if($remember == "yes"){
      setcookie("idCookie", $id, time()+60*24*60*60, "/"); // 60 days; 24 hours; 60 mins; 60secs
      setcookie("firstnameCookie", $firstname, time()+60*24*60*60, "/"); // 60 days; 24 hours; 60 mins; 60secs
      setcookie("emailCookie", $email, time()+60*24*60*60, "/"); // 60 days; 24 hours; 60 mins; 60secs
      setcookie("passCookie", $pass, time()+60*24*60*60, "/"); // 60 days; 24 hours; 60 mins; 60secs
    }	
	$my_msg = "all_good";
    print "return_msg=$my_msg&id=$id&firstname=$firstname";
	
} else {
$my_msg = "no_good";
    print "return_msg=$my_msg"; 
  exit();
}


}// close if post
?>