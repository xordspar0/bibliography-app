<!DOCTYPE html>
    <html>
        <head>
            <title>delete</title>
        </head>
        <body>
            <?php
                $conn = oci_connect('username', 'password', 
    	 			'(DESCRIPTION=
    	 			(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');
    	 			
	 			$query = "DELETE FROM bibliographies WHERE bID='".$_GET["bID"]."' ";
		        
		        $stid = oci_parse($conn,$query);
		        $objExecute=oci_execute($stid,OCI_DEFAULT);
		        
		        if($objExecute)
		        {
		            oci_commit($conn);
		            echo "Recor Deleted.";
		        }
		        else
		        {
		            oci_rollback($conn);
		            $e=oci_error($stid);
		            echo "Error Delete [".$e['message']."]";
		        }
                oci_free_statement($stid);
                oci_close($conn); 
            ?>
        </body>
    </html>