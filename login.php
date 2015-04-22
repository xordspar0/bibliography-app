<!DOCTYPE HTML>
<?php
session_start();
if($_SESSION['errorMessage'] == null)
{
	$_SESSION['errorMessage']="";
}
$uName="";
$pWord="";
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<header><h1>Login</h1></header>
	<body>
		<br>
		<span class="error">* <?php echo $errorMessage;?></span><br>
		<form action="bibliography_management.php" method="post">
		Name: <br><input type="text" name="name"><br>
		Password: <br><input type="password" name="password"><br><br>
		<input id="button" type="submit" name="submit" value="Log-In">
		</form><br>
		<?php echo $_SESSION['errorMessage']; ?><br>
		<a href="register.php">Register</a>
	</body>
</html>
