<!Doctype html>
<html>

	<head>
		<title>Add a web citation</title>
		<meta charset="utf-8" />
	</head>

	<body>

		<nav>
			<div align="right">
				<a href="javascript:history.back()">Back</a>
			</div>
		</nav>

		<form action="get_web_source.php" method="post">
			<table>
				<tr>
					<td>By URL:</td>
					<td><input type="text" name="url" required /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Add" /></td>
				</tr>
			</table>
		</form>

		<a href="add_citation_manual.php">Manual</a>

	</body>

</html>
