<?php
    $postVars = $_POST;
    require "require_login.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Bibliographies</title>
    		<meta charset="utf-8" />
    		<link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
        <?php require "header.php";
            require "config.php";
            session_start();
            $currentUser=$_SESSION['name'];
            $conn = oci_connect($dbuser, $dbpass, $dbconn);
    
	        $query = "SELECT *  
                      FROM bibliographies 
                      WHERE owner = :currentUser";
        		        
	        $stid = oci_parse($conn,$query);
			oci_bind_by_name($stid, ":currentUser", $currentUser);
        	oci_execute($stid,OCI_DEFAULT);
            	
            while(($row = oci_fetch_array($stid,OCI_NUM)) != false)  
            {
               echo "<a href='view_citations.php?bID=" . $row[0] . "'>" . $row[2] . "</a>";
            }
            
            oci_free_statement($stid);
            oci_close($conn);
        
        require "footer.php"; ?>
    </body>
</html>
