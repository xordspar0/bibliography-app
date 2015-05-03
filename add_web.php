<!DOCTYPE html>
<html>
    <body>
        <form action="add_citation_manual.php" method="post">
					<table>
						<tr>
							<td>Title:</td>
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
						    <td>Publication Date(dd-mmm-yyy):</td>
						    <td><input type="text" name="pubDate" required/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Add" /></td>
						</tr>
					</table>
				</form>
    </body>
</html>