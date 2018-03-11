<?php
	session_start();
	require("connect.php");
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	//mysqli_query($connection, "SELECT * FROM usermanagement WHERE username = '$username';");
	mysqli_query($connection, "UPDATE usermanagement SET active = '0';");
	if(session_destroy())
	header("Location: login.php");
?>