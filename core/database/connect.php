<?php
$connect_error = 'Sorry, we\'re experiencing connection problems.';
mysql_connect('localhost', 'root', 'root') or die($connect_error);
mysql_select_db('the_dot') or die($connect_error);
?>