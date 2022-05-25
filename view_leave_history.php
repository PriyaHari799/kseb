
<?php

include("includes/emp_header.php");
include("Database/connection.php");
if(isset($_SESSION["id"])!=session_id())
{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='emplogin.php';
      	</script>");
  	}
	else
  	{
?>

<html>

<head>
 
    <link rel='stylesheet' href='stylesheet/empreg.css' type='text/css' />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <style>



    </style>

</head>
<br><br><br><br><BR>
<div class="container mb-4">
  <h3>LEAVE HISTORY</h3>
<table class="table table-bordered table-bordered">
                <thead class="thead-dark">
                    <tr>
                  
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Description</th>
                    <th>Status</th>
                    
                    </tr>
                </thead>
                    <tbody>
                          <?php  
                
                            $username =$_SESSION["Email"];
                          $result = mysqli_query($con,"SELECT `leave_type`, `from_date`, `to_date`, `description`, `status` FROM `tbl_leave` where Email='$username'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr style="background-color: white">
                               
                               <td><?php echo $row["leave_type"]; ?></td>  
                               <td><?php echo $row["from_date"]; ?></td> 
                               <td><?php echo $row["to_date"]; ?></td> 
                               <td><?php echo $row["description"]; ?></td> 
                               <td><?php echo $row["status"]; ?></td> 
                              
                               
                          </tr>  
                          <?php  
                          }  
                          ?>  
                         </tbody>
                     </table>
                     </form>
                        
                         
                </div>  

 
        </div>
        </div>
      
    </div>
 
</body>
</center>                    
</html>

<?php
    }
    ?>
