<?php
$postVars = $_POST;
require "require_login.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Manage your bibliographies</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>

		<?php require 'header.php' ?>

		<ul class="actions">
			<li><a href="my_bibliographies.php">My Bibliographies</a></li>
			<li><a href="create_bibliography.php">Create a new Bibliography</a></li>
		</ul>

		<?php require 'footer.php' ?>
	</body>
</html>
