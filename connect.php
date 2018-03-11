<?php
$connection = mysqli_connect("localhost","root","daisy");
if(!$connection)
	echo "Failed to connect"."<br>";
$dbconnect = mysqli_select_db($connection, "usertable");
if(!$dbconnect)
	echo "Failed to connect to the database" . die(mysqli_error());

?>