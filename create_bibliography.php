<?php
	$postVars = $_POST;
	require "require_login.php";
	require "config.php";
	
	$currentUser=$_SESSION['name'];

	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$bID=$_POST['idNum'];
		$bName=$_POST['bibName'];
		
		$conn= oci_connect($dbuser, $dbpass, $dbconn);
		
		$query="INSERT INTO bibliographies
				VALUES(seq_bibliography.nextval, 
					   :owner,
					   :bibName)";
				
		$stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ":owner", $currentUser);
		oci_bind_by_name($stid, ":bibName", $bName);
		
		oci_execute($stid,OCI_DEFAULT);
		
		oci_commit($conn);
		        
        oci_free_statement($stid);
        oci_close($conn); 
        header("Location: view_bibliographies.php");
	}
?>
