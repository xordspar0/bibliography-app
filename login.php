<!DOCTYPE HTML>
<?php print $errorMessage;?>
$uName="";
$pWord="";
$errorMessage="";
<html>
	<head>
		<title>Login</title>
	</head>
	<header><h1>Login</h1></header>
	<body>
		<span class="error">* <?php echo $errorMessage;?></span><br>
		<form action="bibliography_managment.php" method="post">
		Name: <br><input type="text" name="name"><br>
		Password: <br><input type="text" name="password"><br><br>
		<input id="button" type="submit" name="submit" value="Log-In">
		</form><br>
		
		<a href="register.php">Register</a>
	</body>
</html>
