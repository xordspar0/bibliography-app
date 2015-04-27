<!DOCTYPE HTML>
<?php
	$errorMessage="";
 	if($_SERVER['REQUEST_METHOD']=="POST")
 	{
 		if(empty($_POST['userID']) or empty($_POST['password']))
 		{
 			$errorMessage="User ID and password are required";	
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
				
		        $query = "SELECT * FROM users";
		        
		        $stid = oci_parse($conn,$query);
		        oci_execute($stid,OCI_DEFAULT);
		        
		        if(!empty($row))
			    {
			    	echo "connection successful";
			    }
		        
		        oci_free_statement($stid);
		        oci_close($conn); 
		        
		        //header('Location: login.php');	
		        //exit;
			}
			else
			{
				$errorMessage="Passwords do not match.";
			}
 		}
 	}
 ?>
<html>
	<head>
		<title>Register a new user</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
	 	<h1>Register</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
	  	
	  	<?php echo $errorMessage;?>
	</body>
</html>
