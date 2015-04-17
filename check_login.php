<!DOCTYPEHTML>
        <html>
        $uName=$pWord=$errorMsg="";
                <body>
                        <?php
                        
                                $uName=
                                
                                // The connection string is loooooooong. It's easiest to copy/paste this line. Remember to replace 'username' and 'password'!
                                $conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db1.chpc.ndsu.nodak.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');
                                
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
                        ?>
                </body>
        </html>
