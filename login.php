<html>
<head>
<title>login</title>
<style>
	.form{ margin : 10px; width : 25%;}
	input[type=text]{ font-size : 20px; margin : 15px; border-radius : 5px;}
	input[type=password]{ font-size : 20px; margin : 15px; border-radius : 5px;}
	input[type=submit]{ width : 25%;  color : green; padding : 14px 20px; margin : 8px 0;
					border : none; border-radius : 4px; cursor : pointer; font-size : 15px;}
	p.par1{ font-size : 20px; color : purple;}
	p.par2{ font-size : 20px;}
</style>
</head>
<body><hr>
<center>
<p class = "par1">LOGIN FORM</p><hr>
<div class = "form">
<form method = "POST">
	<input type = "text" placeholder = "Username" name = "username"><br>
	<input type = "password" placeholder = "Password" name = "password"><br>
	<input type = "submit" value = "Submit"><br>
</form>
</div>
<p class = "par2">
	<a href = "home.html">BACK</a>
</p>
</center>
</body>
</html>
<?php
session_start();
require('connect.php');
if(isset($_POST) & !empty($_POST))
{
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM usermanagement WHERE username = '$username' and password = '$password';";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1)
	{
		$_SESSION['username'] = $username;
	}
	else
	{
		echo "Invalid login";
	}
}
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	echo "<hr>"."<br>"."<p style = 'margin : 10px 20px; font-size : 40px; text-align : center; color : purple;'>".
		"Welcome ".$username." !!!!!!"."</p>"."<hr>"."<br>"."Do u want to make the call for the test???"."<br>".
		"If yes, please provide ur current location."."<br>".
		'<form method = "POST">
		<input type = "text" placeholder = "Current location" name = "address"><br>
		<input type = "submit" value = "Call for the test"> </form>';
		if(isset($_POST['address']) & !empty($_POST['address']))
		{
			$address = mysqli_real_escape_string($connection, $_POST['address']);
			$query = "UPDATE usermanagement SET address = '$address', active = '1' WHERE username = '$username';";
			$res = mysqli_query($connection, $query);
			
			if($res)
			{
				echo "The test will be provided soon..."."<br>"."<br>";
				echo "Has the test arrived????<br> If yes please confirm.<br>";
				echo '<a href = "logout.php">Yes, I have done the test</a>';
			}
		}
}
?>