<!Doctype html>
<html>

	<head>
		<title>Add a web citation</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>

	<body>

	<?php require 'header.php' ?>

		<section>
			<span>Enter the URL of the source you want to add.</span>
			
			<form action="get_web_source.php" method="post">
				<input type="url" name="url" value="http://" required />
				<br>
				<input type="submit" value="Add" />
			</form>
			
			<a href="add_citation_manual.php">Enter the source manually</a>
		
		</section>

	<?php require 'footer.php' ?>

	</body>

</html>
