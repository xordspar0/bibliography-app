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
<<<<<<< HEAD
		require('config.php');
=======
        require "dbconnect.php";
>>>>>>> 92397d06b6d10a7ee3154927de01e0cc783392a6
        session_start();
        $currentUser=$_SESSION['name'];
        $conn = dbconnect();
    				
<<<<<<< HEAD
    		        $query = "SELECT *  
                              FROM bibliographies 
                              WHERE userID = :currentUser";
    		        
	        $stid = oci_parse($conn,$query);
			oci_bind_by_name($stid, ":currentUser", $currentUser);
        	oci_execute($stid,OCI_DEFAULT);
=======
    	$query = "SELECT bibliographies.name FROM bibliographies, users 
                  WHERE users.userID = :currentUser AND users.userID = bibliographies.userID";
    	$stid = oci_parse($conn,$query);
    	oci_bind_by_name($stid, ":currentUser", $currentUser);
    	oci_execute($stid,OCI_DEFAULT);
>>>>>>> 92397d06b6d10a7ee3154927de01e0cc783392a6
    ?>
       <!--These are test widths to be changed later-->
    <table width="600" border="1">  
        <tr>  
        <th width="100"> <div align="center">BibliographyID </div></th>  
        <th width="70"> <div align="center">Name </div></th>  
        <th width="70"> <div align="center">OwnerID </div></th>  
        <th width="100"> <div align="center">Last Modified </div></th>  
        <th width="100"> <div align="center">Date Created </div></th>  
        </tr>  
    <?php   
        while($objResult = oci_fetch_array($stid,OCI_BOTH))  
        {
    ?>
            <tr>
                <td> <div align="center"><?php echo $objResult["bID"];?></div></td>
                <td> <div aligh="center"><?php echo $objResult['name'];?></div></td>
                <td> <div align="center"><?php echo $objResult['users.userID'];?></div></td>
                <td> <div align="center"><?php echo $objResult['dateModified'];?></div></td>
                <td> <div align="center"><?php echo $objResult['dateCreated'];?></div></td>
            </tr>
    <?php        
        }
    ?>
    </table>
    <?php
        oci_free_statement($stid);
        oci_close($conn); 
    ?>
    
	<?php require 'footer.php' ?>
</body>
</html>
