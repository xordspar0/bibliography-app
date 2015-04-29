<!DOCTYPE html>
<?php
	require('config.php');
	$uName=$_POST['name'];
	$pWord=$_POST['password'];
	
	$conn = oci_connect($dbuser, $dbpass, $dbconn);

    $query = "SELECT users.userID, users.password FROM users WHERE users.password='$pWord' AND users.userID='$uName' ";
    
    $stid = oci_parse($conn,$query);
    oci_execute($stid,OCI_DEFAULT);
    
    session_destroy();
    session_start();
    
    $row = oci_fetch_array($stid,OCI_ASSOC);
    if(!empty($row))
    {
    	$_SESSION['errorMessage']="";
    	$_SESSION['name']=$uName;
    }
    else
    {
    	$_SESSION['errorMessage']="invalid username or password";
    	header("Location: login.php");
    	exit;
    }
    
    oci_free_statement($stid);
    oci_close($conn); 
	
?>
<html>
	<head>
		<title>Manage your bibliographies</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
		
		

		<?php require 'header.php' ?>

		<ul class="actions">
			<li><a href="my_bibliographies.php">My Bibliographies</a></li>
			<li><a href="create_new_bibliography.php">Create a new Bibliography</a></li>
		</ul>

		<?php require 'footer.php' ?>
	</body>
</html>
