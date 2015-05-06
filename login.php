<!DOCTYPE HTML>
<?php
session_start();
if($_SESSION['errorMessage'] == null)
{
	$_SESSION['errorMessage']="";
}
else
{
	$errorMessage = $_SESSION['errorMessage'];
	$_SESSION['errorMessage']="";
}

$uName="";
$pWord="";
?>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<header><h1>Login</h1></header>
	<body>
		<br>
		<form action="management.php" method="post">
		Name: <br><input type="text" name="name"><br>
		Password: <br><input type="password" name="password"><br><br>
		<input id="button" type="submit" name="submit" value="Log-In">
		</form><br>
		<?php echo $errorMessage; ?><br>
		<a href="register.php">Register</a>
	</body>
</html>
