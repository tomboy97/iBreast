<?php
if($_POST)
{
	$rname = $_POST['rname'];
	$reply = $_POST['reply'];
	$connect = mysqli_connect("localhost","root","daisy");
	if($connect)
	{
		mysqli_select_db($connect, "comments");
		$query = "UPDATE data SET rname = '$rname', reply = '$reply';";
		header("Location: comment.php");
		if(!mysqli_query($connect, $query))
			die("Failed to connect to database: ".mysql_error());
	}
	else
	{
		die("Failed to connect to mysql: ".mysql_error());
	}	
}
?>
<html>
<head>
<title>reply</title>
<style type = "text/css">
	.form{ margin : 10px 40px;}
	
	input[type=submit]{ width : 25%;  color : green; padding : 14px 20px; margin : 8px 0;
					border : none; border-radius : 4px; cursor : pointer; font-size : 15px;}			
</style>
</head>
<body><hr>
<p style = "font-size : 40px; text-align : center;">CAN U REPLY THIS QUERY????</p><hr>
<div class = "form">
<form method = "POST">
	Name :<br>
	<input type = "text" name = "rname"><br>
	Reply :<br>
	<textarea name = "reply" rows = "10" cols = "40"></textarea><br>
	<input type = "submit" value = "Submit">
</form>
</div>
</body>
</html>