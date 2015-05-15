<?php

//------------------------------Created By Zane Pocock @ www.thedot.co.nz---------------------------

session_start(); // Must start session first thing

// See if they are a logged in member by checking Session data
$toplinks = "";
if (isset($_SESSION['id'])) {
	// Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $email = $_SESSION['email'];
	$toplinks = '<a href="member_profile.php?id=' . $userid . '">' . $username . '</a> 
	<a href="member_profile.php?id=' . $userid . '">Account</a> 
	<a href="edit_profile.php?id=' . $userid . '">Edit Profile</a> 
	<a href="scripts/logout.php">Log Out</a>';
} else {
	$toplinks = '<a href="register.php">Register</a>  <a href="login.php">Login</a>';
}
?>
<?php
// Use the URL 'id' variable to set who we want to query info about
$id = ereg_replace("[^0-9]", "", $_GET['id']); // filter everything but numbers for security
if ($id == "") {
	include_once"index.php";
	exit();
}
//Connect to the database through our include 
include_once "scripts/connect_to_mysql.php";
// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count > 1) {
	echo "There is no user with that id here.";
	exit();	
}
while($row = mysql_fetch_array($sql)){
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$country = $row["country"];
$region = $row["region"];
$city = $row["city"];
$account_type = $row["account_type"];
$bio = $row["bio"];
// Convert the sign up date to be more readable by humans
$signupdate = $row["signupdate"];
$signupdate = strftime("%b %d, %Y", strtotime($row['signupdate']));
$last_log_date = $row["last_log_date"];
$last_log_date = strftime("%b %d, %Y", strtotime($row['last_log_date']));

// Mechanism to Display Pic. see if they have uploaded a pic or not //
$check_pic = "members/$id/image01.jpg";
$default_pic = "members/0/image01.jpg";
if (file_exists($check_pic)){
$user_pic = "<img src=\"$check_pic\"width=\"100px\"/>";
} else {
	$user_pic = "<img src=\"$default_pic\"/>";
}

}

$style_sheet="default";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="Description" content="<?php print "$firstname $lastname"; ?>'s Profile on The Dot" />
<meta name="Keywords" content="<?php print "$firstname, $lastname, $city, $country,"; ?>personal profile, new zealand art social network, new zealand, new art, art social network, social network, the dot" />
<meta name="rating" content="General" />
<meta name="revisit-after" content="7 days" />
<meta name="ROBOTS" content="All" />
<title><?php print "$firstname $lastname"; ?>'s Profile on The Dot</title>
<link href="/style_profiles/<?php print "$style_sheet"; ?>.css" rel="stylesheet" type="text/css" /> 
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=169074863173649";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="exterior">

<div id="wrapper">

<?php include_once "header_template.php"; ?>

<div id="maincontent">

<div id="contentleft">

<table style="background-color: #efebeb)" width="100%" border="0" >
  <tr>
    <td width="78%"><h1><?php echo "$firstname"; echo "&nbsp;"; echo "$lastname"; ?></h1></td>
    <td width="22%"><?php echo $toplinks; ?></td>
  </tr>
</table>
<table  align="center" style="line-height:1.5em;">
  <tr>
    <td width="31%" rowspan="2" valign="top">
    <!-- See the more advanced member system tutorial to see how to place default placeholder pic until member uploads one -->
    <div align="center"><?php echo "$user_pic"; ?></div></td>
    <td width="39%" rowspan="2" valign="top">Name: <?php echo "$firstname"; echo "&nbsp;"; echo "$lastname"; ?><br />
      Email: <?php echo $_SESSION['email']; ?><br />
      City: <?php echo "$city"; ?><br />
      Region: <?php echo "$region"; ?><br />
      Country: <?php echo "$country"; ?> <br />
    </td>
    <td width="30%" valign="top">Bio</td>
  </tr>
  <tr>
    <td valign="top"><?php echo "$bio"; ?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="2" valign="top">Sign up date: <?php echo "$signupdate"; ?></td>
  </tr>
</table>
</div>

<div id="contentright"><?php include_once "right_template.php" ?></div>

</div><!--end main content-->

<?php include_once "footer_template.php"; ?>

</div><!--end wrapper-->
</div><!--end exterior-->
</body>
</html>