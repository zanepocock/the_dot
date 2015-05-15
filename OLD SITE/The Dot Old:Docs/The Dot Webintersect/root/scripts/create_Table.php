<?php

// connect to your MySQL database here using the 
// script we made in the previous step of this lesson
require_once "connect_to_mysql.php";
// Tell ourselves on screen if we have connected
print "Success in database CONNECTION.....<br />";
// Create the members main table in your new database
$result = "CREATE TABLE myMembers (
id int(11) NOT NULL auto_increment,
firstname varchar(255) NOT NULL,
middlename varchar(255) NULL,
lastname varchar(255) NOT NULL,
country varchar(255) NOT NULL,
region varchar(255) NOT NULL,
city varchar(255) NOT NULL,
phone varchar(255) NULL,
email varchar(255) NOT NULL,
password varchar(255) NOT NULL,
sign_up_date date NOT NULL default '0000-00-00',
last_log_date date NOT NULL default '0000-00-00',
bio_body text NULL,
website varchar(255) NULL,
account_type enum('a','b','c') NOT NULL default 'a',
email_activated enum('0','1') NOT NULL default '0',
PRIMARY KEY (id),
UNIQUE KEY email (email)
) ";
if (mysql_query($result)){
print "Success in TABLE creation!......
<br /><br /><b>That completes the table setup, now delete the file <br />
named 'create_Table.php' and you are ready to move on. Let us go!</b>";
} else {
print "no TABLE created. You have problems in the system already, backtrack and debug!";
}
exit();
?>