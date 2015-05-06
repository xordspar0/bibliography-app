<?php
	$postVars = $_POST;
	require "require_login.php";
	require "config.php";
	
	$currentUser=$_SESSION['name'];
	
	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
		$bID = htmlspecialchars($_GET["bID"]);
		
		$conn= oci_connect($dbuser, $dbpass, $dbconn);
		
		$query="INSERT INTO citations
				VALUES(seq_citation.nextval, 
					   //TODO: insert appropriate variables
					   ";
		
    	$stid = oci_parse($conn, $query);
        oci_execute($stid,OCI_DEFAULT);
		oci_commit($conn);
        oci_free_statement($stid);
        
		if ($_GET["type"] == "book")
		{
    		$query="INSERT INTO books
    				VALUES(seq_citation.nextval, 
    					   //TODO: insert appropriate variables
    					   ";
    		$stid = oci_parse($conn, $query);
            //TODO: bind the variables the the query
		}
		elseif ($_GET["type"] == "periodical")
		{
		    $query="INSERT INTO periodicals
    				VALUES(seq_citation.nextval, 
    					   //TODO: insert appropriate variables
    					   ";
    		$stid = oci_parse($conn, $query);
            //TODO: bind the variables the the query
		}
		elseif ($_GET["type"] == "web")
		{
		    $query="INSERT INTO website
    				VALUES(seq_citation.nextval, 
    					   //TODO: insert appropriate variables
    					   ";
    		$stid = oci_parse($conn, $query);
            //TODO: bind the variables the the query
		}
		
		oci_execute($stid,OCI_DEFAULT);
		oci_commit($conn);
        oci_free_statement($stid);
        oci_close($conn);
        
        header("Location: view_citations.php");
	}
?>