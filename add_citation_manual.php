<?php
	$postVars = $_POST;
	require "require_login.php";
	$currentBib=$_GET["bID"];
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
		<?php require 'header.php' ?>
		<select id="typeSelector" onchange="changeType()">
			<option value="">Select type...</option>
			<option value="book">Book</option>
			<option value="periodical">Periodical</option>
			<option value="web">Web</option>
		</select>
		
		<form id="book" action="" method="post" style="display: none;">
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
				
		<form id="periodical" action="" method="post" style="display: none;">
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
					<td>City:</td>
					<td><input type="text" name="city" required/></td>
				</tr>
				<tr>
					<td>Periodical Name:</td>
					<td><input type="text" name="perName" required/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Add" /></td>
				</tr>
			</table>
		</form>
				
		<form id="web" action="" method="post" style="display: none;">
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
			
			type = document.getElementById("typeSelector").value;
			document.getElementById(type).style.display = "table";
		}
	</script>
	
	</body>

</html>
