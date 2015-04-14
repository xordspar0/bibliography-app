<!DOCTYPE html>
  <html>
    <head>
      <title>My Bibliographies</title>
      <h1>My Bibiographies</h1>
      <div align="right">
        <a href="bibliography_management.php">Back</a>
      	<a href="login.php">Logout</a>
      </div>
    </head>
    <body>
      <!--Add a list of Bibliographies based on the query 
      "SELECT bibliographies.name 
       FROM bibliographies, users 
       WHERE users.userID = (ID of the current user) AND users.userID = bibliographies.userID"-->
    </body>
  </html>
