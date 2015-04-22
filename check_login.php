<?php

require "dbconnect.php";

$uName=$pWord=$errorMsg="";
                
$uName=$_POST["name"];
$pWord=$_POST["pWord"];

$conn = dbconnect();

// TODO: do sanitation to prevent SQL injections
$query = 'SELECT users.userID, users.password FROM users WHERE users.userID=' . $uName . ' AND users.password=' . $pWord . '';

$stid = oci_parse($conn,$query);
oci_execute($stid,OCI_DEFAULT);
        
if (oci_fetch_array($stid,OCI_ASSOC))
{
        session_start();
        $_SESSION['name']=$uName;
        // Redirect to the bibliography management page
}
else
{
        // Return to the login page
}

oci_free_statement($stid);
oci_close($conn);

?>