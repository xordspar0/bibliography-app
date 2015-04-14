<!Doctype html>
<html>

	<head>
		<title>Add a citation manually</title>
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

	</body>

</html>
