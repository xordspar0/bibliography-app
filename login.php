<!DOCTYPE HTML>
<?php
session_start();

if($_POST['userID']==null)
{
	if(empty($_POST['userID']) or empty($_POST['password']))
	{
		$_SESSION['errorMessage']="User ID and password are required";
		header('Location: register.php');
	}
	else
	{
		$userID=$_POST['userID'];
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$password=$_POST['password'];
		$rePassword=$_POST['rePassword'];
			
		if($password==$rePassword)
		{
			$conn = oci_connect('username', 'password', 
	 		'(DESCRIPTION=
	 		(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');
			
	        $query = "INSERT INTO users 
	        		  VALUES('$userID',
	        		  		 '$firstName',
	        		  		 '$lastName',
	        		  		 '$password')";
		        
	        $stid = oci_parse($conn,$query);
	        oci_execute($stid,OCI_DEFAULT);
	        
	        
	        oci_free_statement($stid);
	        oci_close($conn); 
		}
		else
		{
			$_SESSION['errorMessage']="Passwords do not match.";
			header('Location: register.php');
		}
	}
}
 		
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
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
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
