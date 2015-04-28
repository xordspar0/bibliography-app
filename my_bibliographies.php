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
        session_start();
        $currentUser=$_SESSION['name'];
        $conn = oci_connect('username', 'password', 
    	 			'(DESCRIPTION=
    	 			(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');
    				
    		        $query = "SELECT bibliographies.name 
                              FROM bibliographies, users 
                              WHERE users.userID = '$currentUser' AND users.userID = bibliographies.userID";
    		        
    		        $stid = oci_parse($conn,$query);
    		        oci_execute($stid,OCI_DEFAULT);
    ?>
       <!--These are test widths to be changed later-->
    <table width="1000" border="1">  
        <tr>  
        <th width="91"> <div align="center">BibliographyID </div></th>  
        <th width="59"> <div align="center">Name </div></th>  
        <th width="98"> <div align="center">OwnerID </div></th>  
        <th width="198"> <div align="center">Last Modified </div></th>  
        <th width="150"> <div align="center">Date Created </div></th>  
        <th width="30"> <div align="center">Delete</div></th>
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
                <td> <div align="center"><a href="delete.php?bID=<?php=$objResult['bID'];?>">Delete</a></div></td>
                <!--Confirm Delete
                <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true)
                {window.location='delete.php?bID=<?php=$objResult['bID'];?>';}">Delete</a></td>
                -->
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
