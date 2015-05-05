<?php
	$postVars = $_POST;
	require "require_login.php";
	require "config.php";
	
	$currentUser=$_SESSION['name'];

	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$bID=$_POST['idNum'];
		$bName=$_POST['bibName'];
		
		$conn= oci_connect($dbuser, $dbpass, $dbconn);
		
		$query="INSERT INTO bibliographies
				VALUES(seq_bibliography.nextval, 
					   :owner,
					   :bibName)";
				
		$stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ":owner", $currentUser);
		oci_bind_by_name($stid, ":bibName", $bName);
		
		oci_execute($stid,OCI_DEFAULT);
		
		oci_commit($conn);
		        
        oci_free_statement($stid);
        oci_close($conn); 
        header("Location: bibliography_management.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create a Bibliography</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>

	<body>

	<?php require 'header.php' ?>

		<!--TODO: Create the bibliography and store it in the database before going
			to the add citation page-->
		<h2>Create a New Bibliography</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
	<?php require 'footer.php' ?>
	</body>
</html>
