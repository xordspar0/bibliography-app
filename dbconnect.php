<?php
/*
 * dbconnect.php: creates a connection to a database
 */

require "config.php";

function dbconnect() {
	return oci_connect($dbuser, $dbpass, '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');
}
?>
