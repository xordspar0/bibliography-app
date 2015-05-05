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
