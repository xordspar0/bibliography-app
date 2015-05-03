<?php
	require "dbconnect.php";
	
	session_start();
	
	if(!empty($uName=$_POST['name']) and !empty($_POST['password']))
	{
	    $uName=$_POST['name'];
	    $pWord=$_POST['password'];
	    $conn = dbconnect();
        $query = "SELECT users.userID, users.password FROM users
                  WHERE users.userID=:uName AND users.password=:pWord";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":uName", $uName);
        oci_bind_by_name($stid, ":pWord", $password);
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
	}
	elseif(!empty($_SESSION['name']))
	{
	    $_SESSION['errorMessage']="login required";
	    header("Location: login.php");
	    exit;
	}
?>