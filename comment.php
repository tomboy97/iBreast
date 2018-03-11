<?php
if($_POST)
{
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$connect = mysqli_connect("localhost","root","daisy");
	if($connect)
	{
		mysqli_select_db($connect, "comments");
		$query = "INSERT INTO data(name, comment) VALUES('$name','$comment')";
		if(!mysqli_query($connect, $query))
			die("Failed to connect to database: ".mysqli_error());
	}
	else
	{
		die("Failed to connect to mysql: ".mysql_error());
	}	
}
$connect = mysqli_connect("localhost","root","daisy");

if($connect)
{
	echo "<hr>"."<p style = 'font-size : 40px; text-align : center;'>"."DISCUSSIONS"."</p>"."<hr>";
	mysqli_select_db($connect, "comments");
	$query7 = "SELECT * FROM data";
	$result = mysqli_query($connect, $query7);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
			echo "<p style = 'outline-style : solid; outline-color : magenta; border-radius : 4px; 
			margin : 20px 40px; padding : 20px;'>".$row['name']."<br>".$row['comment']."</p>";
			
			echo "<p style = 'outline-style : solid; outline-color : green; border-radius : 4px;
			margin : 20px 40px; padding : 20px;'>".$row['rname']." : "."<br>".$row['reply']."</p>";
			
		
	}
}
else
{
	die("Failed to connect: ".mysql_error());
}

?>
<html>
<head>
<title>comment</title>
<style type = "text/css">
	.form{ margin : 10px 40px;}
	
	input[type=submit]{ width : 25%;  color : green; padding : 14px 20px; margin : 8px 0;
					border : none; border-radius : 4px; cursor : pointer; font-size : 15px;}
	input[type=button]{ width : 25%;  color : green; padding : 14px 20px; margin : 8px 0;
					border : none; border-radius : 4px; cursor : pointer; font-size : 15px;}				
</style>
</head>
<body>
<div class = "form">
	<form method = "POST">
		<h3>Name : </h3><br>
		<input type = "text" name = "name"><br>
		<h3>Comments : </h3><br>
		<textarea name = "comment" rows = "10" cols = "40"></textarea><br>
		<input type = "submit" value = "Post Comment"><br>
		<input type = "button" onclick = "location.href = 'reply.php';" value = "Can you reply??">
	</form>
</div>
</body>
</html>		