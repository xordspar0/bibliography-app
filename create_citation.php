<?php
	$postVars = $_POST;
	require "require_login.php";
	require "config.php";
	
	$currentUser=$_SESSION['name'];
	
	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
		$currentBib = htmlspecialchars($_GET["bID"]);
		
		$conn= oci_connect($dbuser, $dbpass, $dbconn);
		
		$query="INSERT INTO citations
				VALUES(seq_citation.nextval, 
					   :bID,
					   :first,
					   :last,
					   :title,
					   :medium)";
		
    	$stid = oci_parse($conn, $query);
    	oci_bind_by_name($stid, ":bID", $currentBib);
    	oci_bind_by_name($stid, ":first", $_POST["first"]);
    	oci_bind_by_name($stid, ":last", $_POST["last"]);
    	oci_bind_by_name($stid, ":title", $_POST["title"]);
    	oci_bind_by_name($stid, ":medium", $_GET["type"]);
        oci_execute($stid,OCI_DEFAULT);
		oci_commit($conn);
        oci_free_statement($stid);
        
		if ($_GET["type"] == "book")
		{
    		$query="INSERT INTO books
    				VALUES(seq_citation.currval, 
    					   :city,
    					   :publisher,
    					   :yearPublished)";
    		$stid = oci_parse($conn, $query);
            oci_bind_by_name($stid, ":city", $_POST["city"]);
            oci_bind_by_name($stid, ":publisher", $_POST["publisher"]);
            oci_bind_by_name($stid, ":yearPublished", $_POST["yearPub"]);
		}
		elseif ($_GET["type"] == "periodical")
		{
		    $query="INSERT INTO periodicals
    				VALUES(seq_citation.currval, 
    					   :name,
    					   :pubDate,
    					   :pageNum)";
    		$stid = oci_parse($conn, $query);
            oci_bind_by_name($stid, ":name", $_POST["perName"]);
            oci_bind_by_name($stid, ":pubDate", $_POST["pubDate"]);
            oci_bind_by_name($stid, ":pageNum", $_POST["pageNum"]);
		}
		elseif ($_GET["type"] == "web")
		{
		    $query="INSERT INTO website
    				VALUES(seq_citation.currval, 
    					   :name,
    					   :pubDate)";
    		$stid = oci_parse($conn, $query);
            oci_bind_by_name($stid, ":name", $_POST["webName"]);
            oci_bind_by_name($stid, ":pubDate", $_POST["pubDate"]);
		}
		else
		{
			echo "<script>alert('Not working');</script>";
		}
		
		oci_execute($stid,OCI_DEFAULT);
		oci_commit($conn);
        oci_free_statement($stid);
        oci_close($conn);
        
        header("Location: view_citations.php?bID=" . $currentBib);
	}
?>