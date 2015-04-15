<!DOCTYPE HTML>
<?php print $errorMessage;?>
$uName="";
$pWord="";
$errorMessage="";
$num_rows=0;
<html>
	<head>
		<title>Login</title>
	</head>
	<header><h1>Login</h1></header>
	<body>
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			<?php
				<form method="post" action="">
				Name: <br><input type="text" name="name"><br>
				Password: <br><input type="text" name="password"><br><br>
				<input id="button" type="submit" name="submit" value="Log-In">
				</form><br>
				
				$uName=$_POST['name'];
				$pWord=$_POST['password'];
				
				$uname = htmlspecialchars($uname);
				$pword = htmlspecialchars($pword);
				
				$conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');
				
				$query = 'SELECT * FROM users WHERE userID='$uName' AND password='$pword'';
				
				$stid = oci_parse($conn,$query);
				oci_execute($stid,OCI_DEFAULT);
				
				
			
				<a href="register.php">Register</a>
			?>
		}
	</body>
</html>
