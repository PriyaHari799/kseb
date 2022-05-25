

<?php
session_start();
include 'Database/connection.php';


            if(isset($_POST['login']))
            {

              $uname = $_POST['uname'];
              $password = $_POST['upass'];
			  
              $query = "SELECT * FROM tbl_usereg WHERE `username`='$uname' AND `password`= '$password'";	
              $result = mysqli_query($con,$query);


              if (mysqli_num_rows($result)>0) 
              {
                while ($row=mysqli_fetch_assoc($result))
                {
                  $dp = $row['username'];
                  $dps = $row['password'];
                  $ds = $row['status'];

                  $_SESSION["id"] = session_id();
                  $_SESSION["username"] = $row['username'];
                  $_SESSION["email"] = $row['email'];
                  $_SESSION["phone"] = $row['phone'];
                  $_SESSION["password"] = $row['password'];
                  $_SESSION["status"] = $row['status'];
                }
                if ($dp == $uname && $ds == '1')
                {
                echo ("<script LANGUAGE='JavaScript'>
              
                    window.location.href='userhome.php';
                  </script>");
                }
                else if($dp == $uname && $ds == '2')
                {
                  echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='adminpanel.php';
                  </script>");
                }
                
                
                else
                {
                  session_destroy();
                  echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Incorrect username/password');
                    window.location.href='login.php';
                    </script>");
                }
                
              }
              else
              {
                echo  ("<script LANGUAGE='JavaScript'>
                    window.alert('Invalid user');
                    window.location.href='login.php';
                    </script>");
              }
            }
          ?>

