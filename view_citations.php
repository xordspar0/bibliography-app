<?php
	$postVars = $_POST;
	require "require_login.php";
	require "config.php";

	session_start();
	
	$currentUser = $_SESSION["name"];
	$currentBib = htmlspecialchars($_GET["bID"]);
	echo $currentBib;


	$conn = oci_connect($dbuser, $dbpass, $dbconn);
	$query = "SELECT *
              FROM bibliographies 
              WHERE bID = :currentBib";
        		        
	$stid = oci_parse($conn,$query);
	oci_bind_by_name($stid, ":currentBib", $currentBib);
    oci_execute($stid,OCI_DEFAULT);
	
	$foundBib = oci_fetch_array($stid);
	
	if ($foundBib[1] != $currentUser) {
		header("Location: view_bibliographies.php");
	}
	
	oci_free_statement($stid);
?>		
			

<!DOCTYPE html>
<html>

	<head>
		<title>View Citations</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>

	<body>
		<?php require 'header.php' ?>
		
		<h1>View Citations</h1>

<?php
	//Print Book Citations	
	$query="SELECT authorLast, authorFirst, title, city, publisher, yearPublished
			FROM citations, books
			WHERE citations.cID = books.cID AND citations.bID = :bID";
			
	$stid = oci_parse($conn, $query);
	oci_bind_by_name($stid, ":bID", $currentBib);
	
	oci_execute($stid,OCI_DEFAULT);
	
	while(($bookResult = oci_fetch_array($stid, OCI_NUM)) != false)
	{
		echo $bookResult[0].', '.$bookResult[1].'. <i>',$bookResult[2].'.</i> '.$bookResult[3].': '.$bookResult[4].', '.$bookResult[5].'. Print.<br>';	
	}
	
    oci_free_statement($stid);
    
    //Print Periodical Citations
    
	$query="SELECT authorLast, authorFirst, title, periodicals.name, pubDate, pageNum
			FROM citations, periodicals
			WHERE citations.cID = periodicals.cID AND citations.bID = :bID";
			
	$stid = oci_parse($conn, $query);
	oci_bind_by_name($stid, ":bID", $currentBib);
	
	oci_execute($stid,OCI_DEFAULT);
	
	while(($periodicalResult = oci_fetch_array($stid, OCI_NUM)) != false)
	{
		echo $periodicalResult[0].', '.$periodicalResult[1].'. "',$periodicalResult[2].'" <i>'.$periodicalResult[3].'</i> '.$periodicalResult[4].': '.$periodicalResult[5].'. Print.<br>';	
	}
	
    oci_free_statement($stid);
    
    //Print Web Citations
    
	$query="SELECT authorLast, authorFirst, title, website.name, pubDate
			FROM citations, website
			WHERE citations.cID = website.cID AND citations.bID = :bID";
			
	$stid = oci_parse($conn, $query);
	oci_bind_by_name($stid, ":bID", $currentBib);
	
	oci_execute($stid,OCI_DEFAULT);
	
	while(($webResult = oci_fetch_array($stid, OCI_NUM)) != false)
	{
		echo $webResult[0].', '.$webResult[1].'. "',$webResult[2].'" <i>'.$webResult[3].'</i> '.$webResult[4].': n. pag. Web.<br>';	
	}
	
    oci_free_statement($stid);
    oci_close($conn);
?>
		<br><br>
		<select id="typeSelector" onchange="changeType()">
			<option value="">Select type...</option>
			<option value="book">Book</option>
			<option value="periodical">Periodical</option>
			<option value="web">Web</option>
		</select>
		
		<form id="book" action="create_citation.php?bID=<?php echo $currentBib; ?>&type=book" method="post" style="display: none;">
			<table>
				<tr>
					<td>Book Title:</td>
					<td><input type="text" name="title" required /></td>
				</tr>
				<tr>
					<td>Author First:</td>
					<td><input type="text" name="first" required/></td>
				</tr>
				<tr>
					<td>Author Last:</td>
					<td><input type="text" name="last" required/></td>
				</tr>
				<tr>
					<td>City:</td>
					<td><input type="text" name="city" required</td>
				</tr>
				<tr>
					<td>Publisher:</td>
					<td><input type="text" name="publisher" required/></td>
				</tr>
				<tr>
					<td>Year Published</td>
					<td><input type="text" name="yearPub" required</td>
				</tr>
				<tr>
				    <td></td>
				    <td><input type="submit" Value="Add"/></td>
				</tr>
			</table>
		</form>
				
		<form id="periodical" action="create_citation.php?bID=<?php echo $currentBib; ?>&type=periodical" method="post" style="display: none;">
			<table>
				<tr>
					<td>Periodical Title:</td>
					<td><input type="text" name="title" required /></td>
				</tr>
				<tr>
					<td>Author First:</td>
					<td><input type="text" name="first" required/></td>
				</tr>
				<tr>
					<td>Author Last:</td>
					<td><input type="text" name="last" required/></td>
				</tr>
				<tr>
					<td>Periodical Name:</td>
					<td><input type="text" name="perName" required/></td>
				</tr>
				<tr>
					<td>Page Number:</td>
					<td><input type="text" name = "pageNum" required</td>
				</tr>
				<tr>
					<!--<td>Publication Date:</td>:</td>
					<td><input type="text" name="pubDate" required/></td>
					<td><i>(DD-MMM-YYY)</i></td>-->
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Add" /></td>
				</tr>
			</table>
		</form>
				
		<form id="web" action="create_citation.php?bID=<?php echo $currentBib; ?>&type=web" method="post" style="display: none;">
			<table>
				<tr>
					<td>Web Source Title:</td>
					<td><input type="text" name="title" required /></td>
				</tr>
				<tr>
					<td>Author First:</td>
					<td><input type="text" name="first" required/></td>
				</tr>
				<tr>
					<td>Author Last:</td>
					<td><input type="text" name="last" required/></td>
				</tr>
				<tr>
				    <td>Website Name:</td>
				    <td><input type="text" name="webName" required/></td>
				</tr>
				<tr>
					<!--<td>Publication Date:</td>:</td>
					<td><input type="text" name="pubDate" required/></td>
					<td><i>(DD-MMM-YYY)</i></td>-->
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Add" /></td>
				</tr>
			</table>
		</form>

	<?php echo $errorMessage;?>
	<?php require 'footer.php' ?>
	
	<script>
		function changeType() {
			document.getElementById("book").style.display = "none";
			document.getElementById("periodical").style.display = "none";
			document.getElementById("web").style.display = "none";
			
			var type = document.getElementById("typeSelector").value;
			document.getElementById(type).style.display = "table";
		}
	</script>
	
	</body>

</html>