<?php
	$postVars = $_POST;
	require "require_login.php";
	$currentBib=$_GET["bID"];
//	if($_SERVER["REQUEST_METHOD"]=="POST")
//	{
		if(isset($_POST['medium']))	
		{
			$medium=$_POST['medium'];
			switch($medium)
			{
				case "book": 
					include("add_book.php");
					break;
				case "periodical":
					include("add_periodical.php");
					break;
				case "web":
					include("add_web.php");
					break;
			}
		}
//	}
//	else
	//{
	//	$errorMessage="";
	//}
	//Print Book Citations
	$conn= oci_connect($dbuser, $dbpass, $dbconn);
		
	$query="SELECT authorLast, authorFirst, title, city, publisher, yearPublished
			FROM citations, books, bibliographies
			WHERE citations.cID = books.cID AND citations.bID = :bID";
			
	$stid = oci_parse($conn, $query);
	oci_bind_by_name($stid, ":bID", $currentBib);
	
	oci_execute($stid,OCI_DEFAULT);
	
	while($bookResult = oci_fetch_array($stid, OCI_BOTH))
	{
		echo $bookResult['authorLast'].', '.$bookResult['authorFirst'].'. <i>',$bookResult['title'].'.</i> '.$bookResult['city'].': '.$bookResult['publisher'].', '.$bookResult['yearPublished'].'. Print.<br>';	
	}
	
    oci_free_statement($stid);
    oci_close($conn);
    //Print Periodical Citations
    $conn= oci_connect($dbuser, $dbpass, $dbconn);
		
	$query="SELECT authorLast, authorFirst, title, name, pubDate, pageNum
			FROM citations, periodicals, bibliographies
			WHERE citations.cID = periodicals.cID AND citations.bID = :bID";
			
	$stid = oci_parse($conn, $query);
	oci_bind_by_name($stid, ":bID", $currentBib);
	
	oci_execute($stid,OCI_DEFAULT);
	
	while($periodicalResult = oci_fetch_array($stid, OCI_BOTH))
	{
		echo $periodicalResult['authorLast'].', '.$periodicalResult['authorFirst'].'. "',$periodicalResult['title'].'" <i>'.$periodicalResult['name'].'</i> '.$periodicalResult['pubDate'].': '.$periodicalResult['pageNum'].'. Print.<br>';	
	}
	
    oci_free_statement($stid);
    oci_close($conn);
    //Print Web Citations
    $conn= oci_connect($dbuser, $dbpass, $dbconn);
		
	$query="SELECT authorLast, authorFirst, title, name, pubDate
			FROM citations, website, bibliographies
			WHERE citations.cID = website.cID AND citations.bID = :bID";
			
	$stid = oci_parse($conn, $query);
	oci_bind_by_name($stid, ":bID", $currentBib);
	
	oci_execute($stid,OCI_DEFAULT);
	
	while($webResult = oci_fetch_array($stid, OCI_BOTH))
	{
		echo $webResult['authorLast'].'', ''.$webResult['authorFirst'].'. "',$webResult['title'].'" <i>'.$webResult['name'].'</i> '.$webResult['pubDate'].': n. pag. Web.<br>';	
	}
	
    oci_free_statement($stid);
    oci_close($conn);
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Add a citation manually</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>

	<body>
		<!--TODO: Have the users citations in the selected bibliography displayed in MLA format-->
		<p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<select name="medium">
					<option value="">Select...</option>
					<option value="book">Book</option>
					<option value="periodical">Periodical</option>
					<option value="web">Web</option>
				</select>
			</form>
		</p>

	<?php require 'header.php' ?>
	<?php
		if(isset($_POST['medium']))
		{
			echo "test";
			?>
	<?php
			}
			else if($_POST['medium']=="periodical")
			{
	?>
				
	<?php
			}
		}
		else
		{
			$errorMessage="PLease select a medium";
		}
	?>
	<?php echo $errorMessage;?>
	<?php require 'footer.php' ?>

	</body>

</html>
