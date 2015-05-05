<!Doctype html>
<?php
	session_start();
	$currentUser=$_SESSION['name'];
	require ("dbconnect.php");
	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$bID=$_POST['idNum'];
		$bName=$_POST['bibName'];
		
		$conn=dbconnect();
		
		$query="INSERT INTO bibliographies
				VALUES(:bid, 
					   :owner,
					   MAY-05-2015,
					   MAY-05-2015)";
				
		$stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ":bID", $bID);
		oci_bind_by_name($stid, ":owner", $currentUser);
		oci_bind_by_name($stid, ":bibName", $bibName);
		
		oci_execute($stid,OCI_DEFAULT);
		
		oci_commit($conn);
		        
        oci_free_statement($stid);
        oci_close($conn); 
        header("Location: bibliography_management.php");
	}
?>
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
					<td>Database Name:</td>
					<td><input type="text" name="bibName" required /></td>
				</tr>
				<tr>
					<td>Database ID:</td>
					<td><input type="text" name="idNum" required /></td>
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
