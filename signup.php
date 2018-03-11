<?php
	require_once("connect.php");
	if(isset($_POST) & !empty($_POST))
	{
		$firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = md5($_POST['password']);
		$cpassword = md5($_POST['cpassword']);
		if($password == $cpassword){
			$usernamesql = "SELECT * FROM usermanagement WHERE username='$username'";
			$usernameres = mysqli_query($connection, $usernamesql);
			$count = mysqli_num_rows($usernameres);
			if($count == 1)
				echo "Username exists in the database, try with a different username";
			
			$emailsql = "SELECT * FROM usermanagement WHERE email='$email'";
			$emailres = mysqli_query($connection, $emailsql);
			$ecount = mysqli_num_rows($emailres);
			if($ecount == 1)
				echo "Email exists in the database, please reset the password";
			echo "Password matches";
					$sql = "INSERT INTO usermanagement (firstname, lastname, email, username, password) VALUES 
				('$firstname','$lastname','$email','$username','$password')";
		$result = mysqli_query($connection, $sql);
		if($result)
			echo "User registered successfully";
		else
			echo "Registration failed";
		}
		else
			echo "Password does not matches";

	}
	
	
?>


<html>
<head>
<title>signup</title>
<style type = "text/css">
	input[type=submit]{ width : 25%;  color : green; padding : 14px 20px; margin : 8px 0;
					border : none; border-radius : 4px; cursor : pointer; font-size : 15px;}
	input[type=text]{ width : 25%; border-radius : 5px; font-size : 20px; margin : 10px;}
	input[type=password]{ width : 25%; border-radius : 5px; font-size : 20px; margin : 10px;}
	input[type=reset]{ width : 25%; border-radius : 4px; font-size : 15px; padding : 14px 20px; border : none;
						color : green; cursor : pointer;}
	.form{ margin : 20px 30px;}
	p{ text-decoration : underline; text-shadow : ultra-expanded; color : purple; font-size : 20px;}
	.back{ font-size : 30px;}
</style>
</head>
<body><hr>
<center>
<p font-size = "40%" color = "pink">SIGNUP FORM</p><hr>
<div class = "form">
<form method = "post" action = "">
	<input type = "text" name = "firstname" placeholder = "Firstname" value = "<?php if(isset($firstname) &
					!empty($firstname)){ echo $firstname;} ?>"><br>				
	<input type = "text" name = "lastname" placeholder = "Lastname" value = "<?php if(isset($lastname) &
					!empty($lastname)){ echo $lastname;} ?>"><br>
	<input type = "text" name = "email" placeholder = "Email-id" value = "<?php if(isset($email) &
					!empty($email)){ echo $email;} ?>"><br>
	<input type = "text" name = "username" placeholder = "Username" value = "<?php if(isset($username) &
					!empty($username)){ echo $username;} ?>"><br>
	<input type = "password" name = "password" placeholder = "Password"><br>
	<input type = "password" name = "cpassword" placeholder = "Confirm password"><br>
	<input type = "submit" value = "Submit">
	<input type = "reset" value = "Reset">
</form>
</div>
<div class = "back">
	<a href = "home.html">BACK</a>
</div>
</center>
</body>
</html>
