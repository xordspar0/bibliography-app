<!DOCTYPE HTML>
<?php
	session_start();
 ?>
<html>
	<head>
		<title>Register a new user</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
	 	<h1>Register</h1>
	
		<form action="login.php" method="post">
	  	User-ID: <br><input type="text" name="userID">
		<br>
  		First: <br><input type="text" name="firstName">
  		<br>
	  	Last: <br><input type="text" name="lastName">
	  	<br>
	  	Password: <br><input type="text" name="password">
		<br>
	  	Re-Enter Password: <br><input type="text" name="rePassword">
		<br>
	  	<input id="button" type="submit" name="register" value="Register">
	  	
	  	<?php echo $_SESSION['errorMessage'];?>
	</body>
</html>
