<html lang="en">

<div class="pull-right">

<?php 
	if (logged_in() === true) {
		//echo 'Logged In';
		include 'includes/widgets/loggedin.php';
	} else {
		include 'includes/widgets/login.php';
	}

 ?>
                          
</div>

</html>