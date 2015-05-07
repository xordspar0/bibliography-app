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
<!doctype html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
		<section>
			<h1>Login</h1>
			<form action="view_bibliographies.php" method="post">
				Name: <br><input type="text" name="name"><br>
				Password: <br><input type="password" name="password"><br><br>
				<input id="button" type="submit" name="submit" value="Log-In">
			</form>
			
			<p><?php echo $errorMessage; ?></p>
			<p><a href="register.php">Register</a></p>
		</section>
	</body>
</html>
