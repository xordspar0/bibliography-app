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
        <?php require "header.php"; ?>
        
        <section>
        <h1>My Bibliographies</h1>
        
        <?php
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
            
            echo "<ul>\n";
            while(($row = oci_fetch_array($stid,OCI_NUM)) != false)  
            {
               echo "<li><a href='view_citations.php?bID=" . $row[0] . "'>" . $row[2] . "</a></li>\n";
            }
            echo "</ul>\n";
            
            oci_free_statement($stid);
            oci_close($conn);
        ?>
        
        <h2>Create a New Bibliography</h2>
		<form action="create_bibliography.php" method="post">
			<table>
				<tr>
					<td>Bibliography Name:</td>
					<td><input type="text" name="bibName" required /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Add" /></td>
				</tr>
			</table>
		</form>
		</section>
        
    </body>
</html>
