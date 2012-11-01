<?php 
if (logged_in()) {

	include "includes/widgets/logged_in.php";

} else {

	include "includes/widgets/sign_in.php";
	
}

 ?>