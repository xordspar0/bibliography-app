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
				session_start();
				
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
				
				$check=0;
				
				while ($row = oci_fetch_array($stid,OCI_ASSOC)) 
				{
				   	foreach ($row as $item) 
				   	{
		      				$check=$check+1;
				   	}
				}
				oci_free_statement($stid);
				oci_close($conn);
				
				if($check==1)
				{
					$_SESSION['currentUser']=$uName;
					$errorMEssage="Login Successful";
					
				}
				else
				{
					$uName="";
					$pWord="";
					$errorMessage="Invalid username or password";
					$num_rows=0;
				}
				
				<a href="register.php">Register</a>
			?>
		}
	</body>
</html>
