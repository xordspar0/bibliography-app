<!DOCTYPEHTML>

        <?php
                require "dbconnect.php";

                $uName=$pWord=$errorMsg="";
                
                session_start();
                $uName=$_POST["name"];
                $pWord=$_POST["pWord"];
                
                $conn = dbconnect();
                
                //put your query in here
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
                }
        ?>
    
