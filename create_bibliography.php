<!Doctype html>
<html>

	<head>
		<title>Create a Bibliography</title>
		<meta charset="utf-8" />
	</head>

	<body>

	<?php require 'header.php' ?>

		<form action="add_citation_web.php" method="post">
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="bibName" required /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Next" /></td>
				</tr>
			</table>
		</form>

	<?php require 'footer.php' ?>

	</body>

</html>
