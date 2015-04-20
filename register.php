<!DOCTYPE HTML>
<html>
	<head>
		<title>Register a new user</title>
	</head>
	<body>
	  
	 	<h1>Register</h1>
	
		<?php
			$idErr=$firstErr=$lastErr=$passErr=$repassErr="";
			$userID=$firstName=$lastName=$password=$rePassword="";
			
			if($_SERVER['REQUEST_METHOD']=="POST")
			{
				if(empty($_POST["userID"]))
				{
					$idErr="userID is required";
				}
				else
				{
					$userID=$_POST["userID"];
				}
				
				if(empty($_POST["firstName"]))
				{
					$firstErr="First name is required";
				}
				else
				{
					$firstName=$_POST["firstName"];
				}
				
				if(empty($_POST["lastName"]))
				{
					$lastErr="Last name is required";
				}
				else
				{
					$lastName=$_POST["lastName"];
				}
				
				if(empty($_POST["password"]))
				{
					$passErr="Password is required";
				}
				else
				{
					$password=$_POST["password"];
				}
				
				if(empty($_POST["rePassword"]))
				{
					$repassErr="Password must be re-entered";
				}
				else
				{
					$password=$_POST["rePassword"];
				}
			}
		?>
	
		<p><span class="error">* required field.</span></p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  	User-ID: <br><input type="text" name="userID">
		<span class="error">* <?php echo $idErr;?></span>	<br>
  		First: <br><input type="text" name="firstName">
  		<span class="error">* <?php echo $firstErr;?></span><br>
	  	Last: <br><input type="text" name="lastName">
	  	<span class="error">* <?php echo $lastErr;?></span><br>
	  	Password: <br><input type="text" name="password">
		<span class="error">* <?php echo $passErr;?></span><br>
	  	Re-Enter Password: <br><input type="text" name="rePassword">
		<span class="error">* <?php echo $repassErr;?></span><br>
	  	<input id="button" type="submit" name="register" value="Register">
		
	
	
	</body>
</html>
