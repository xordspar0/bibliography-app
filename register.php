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
 			$conn = oci_connect('username', 'password', 
 			'(DESCRIPTION=
 			(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');
			
			$userID=$_POST['userID'];
			$firstName=$_POST['firstName'];
			$lastName=$_POST['lastName'];
			$password=$_POST['password'];
			
	        $query = "INSERT INTO users 
	        		  VALUES('$userID',
	        		  		 '$firstName',
	        		  		 '$lastName',
	        		  		 '$password')";
	        
	        $stid = oci_parse($conn,$query);
	        oci_execute($stid,OCI_DEFAULT);
	        
	        oci_free_statement($stid);
	        oci_close($conn); 
	        
	        header('Location: login.php');
 		}
 	}
 ?>
<html>
	<head>
		<title>Register a new user</title>
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
