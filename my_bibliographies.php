<!DOCTYPE html>
<html>
<head>
    <title>My Bibliographies</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <?php require 'header.php' ?>
    <h1>My Bibiographies</h1>
    <!--Add a list of Bibliographies based on the query 
    "SELECT bibliographies.name 
    FROM bibliographies, users 
    WHERE users.userID = (ID of the current user) AND users.userID = bibliographies.userID"-->
    <?php
        require "dbconnect.php";
        session_start();
        $currentUser=$_SESSION['name'];
        $conn = dbconnect();

    		        $query = "SELECT *  
                              FROM bibliographies 
                              WHERE userID = :currentUser";
    		        
	        $stid = oci_parse($conn,$query);
			oci_bind_by_name($stid, ":currentUser", $currentUser);
        	oci_execute($stid,OCI_DEFAULT);
            	
            while($objResult = oci_fetch_array($stid,OCI_BOTH))  
            {
               foreach($objResult as $item)
               {
       ?>
                   <a href="add_citation_manual.php?bID=<?php=$objResult["bID"];?>"><?php echo $objResult["name"];?></a>
       <?php 
               }
            }
        ?>
        </table>
        <?php
            oci_commit($stid);
            oci_free_statement($stid);
            oci_close($conn); 
        ?>
    </body>
</html>
