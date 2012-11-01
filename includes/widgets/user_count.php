<div>

<h2>Registered Users:</h2>

<div class="inner">
	<?php 
	$user_count = user_count();
	$suffix = ($user_count !=1) ? 's' : ''; 
	?>
	We currently have <?php echo $user_count; ?> registered user<?php echo $suffix; ?>.
</div>

</div>

<div>

<h2>Active Users:</h2>

<div class="inner">
	We currently have x active users.
</div>

</div>