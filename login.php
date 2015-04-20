<!DOCTYPE HTML>
<?php print $errorMessage;?>
$uName="";
$pWord="";
$errorMessage="";
<html>
	<head>
		<title>Login</title>
	</head>
	<header><h1>Login</h1></header>
	<body>
		<span class="error">* <?php echo $errorMessage;?></span><br>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		Name: <br><input type="text" name="name"><br>
		Password: <br><input type="text" name="password"><br><br>
		<input id="button" type="submit" name="submit" value="Log-In">
		</form><br>
		
		<a href="register.php">Register</a>
		<?php
			session_start();
			
            $conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

            $query = 'SELECT users.userID, users.password FROM users WHERE users.userID='$uName' AND users.password='$pWord'';
            
            $stid = oci_parse($conn,$query);
            oci_execute($stid,OCI_DEFAULT);
            
            
            $check=0;
            while ($row = oci_fetch_array($stid,OCI_ASSOC)) 
            {
               foreach ($row as $item) 
               {
                  $check=$check+1;
               }
            }
            oci_free_statement($stid);
            oci_close($conn); 
            
            if(check==1)
            {
                $_SESSION['name']=$uName;
                $errorMessage="";
            }
            else
            {
            	$errorMessage="invalid username or password";			
            }
		?>
	</body>
</html>
