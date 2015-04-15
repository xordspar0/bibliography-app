<!Doctype html>
<html>

	<head>
		<title>Add a citation manually</title>
		<meta charset="utf-8" />
	</head>

	<body>

	<?php require 'header.php' ?>

		<!--TODO: Differentiate between source types-->
		<!--TODO: Add the rest of the attributes to the form-->
		<form action="get_web_source.php" method="post">
			<table>
				<tr>
					<td>Title:</td>
					<td><input type="text" name="title" required /></td>
				</tr>
				<tr>
					<td>Author:</td>
					<td><input type="text" name="author" required /></td>
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
