<!DOCTYPE html>
<html>
	<head>
		<title>Manage your bibliographies</title>
	</head>
	<body>
		
		<?php
		$uName=$_POST['name'];
		$pWord=$_POST['password'];
		
		$conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

        $query = "SELECT users.userID, users.password FROM users WHERE users.password='$pWord' AND users.userID='$uName' ";
        
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
        
        session_destroy();
        session_start();
        
        if($check==1)
        {
        	$_SESSION['name']=$uName;
        }
        else
        {
        	$_SESSION['errorMessage']="invalid username or password";
        	header("Location: login.php");
        	exit();
        }
		
		?>

		<?php require 'header.php' ?>

		<ul class="actions">
			<li><a href="my_bibliographies.php">My Bibliographies</a></li>
			<li><a href="create_new_bibliography.php">Create a new Bibliography</a></li>
		</ul>

		<?php require 'footer.php' ?>
	</body>
</html>
