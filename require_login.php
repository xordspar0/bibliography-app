<?php
	require "config.php";
	
	session_start();
	
	if(!empty($postVars['name']) and !empty($postVars['password']))
	{
	    $uName=$postVars['name'];
	    $pWord=$postVars['password'];
	    $conn = oci_connect($dbuser, $dbpass, $dbconn);
        $query = "SELECT users.userID, users.pword FROM users
                  WHERE users.userID=:uName AND users.pword=:pWord";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":uName", $uName);
        oci_bind_by_name($stid, ":pWord", $pWord);
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
	elseif(empty($_SESSION['name']))
	{
	    $_SESSION['errorMessage']="login required";
	    header("Location: login.php");
	    exit;
	}
?>
