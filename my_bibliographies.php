<!DOCTYPE html>
<html>
<head>
  <title>My Bibliographies</title>
</head>
<body>
	<?php require 'header.php' ?>
  <h1>My Bibiographies</h1>
  <!--Add a list of Bibliographies based on the query 
  "SELECT bibliographies.name 
   FROM bibliographies, users 
   WHERE users.userID = (ID of the current user) AND users.userID = bibliographies.userID"-->
	<?php require 'footer.php' ?>
</body>
</html>
