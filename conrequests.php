
<?php
include("includes/aee_header.php");
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

<?php
 $username =$_SESSION["Email"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_employreg  where Email='$username'");
 $row=mysqli_fetch_array($edit);
?>


<?php

 $edit=mysqli_query($con, "SELECT * FROM newconnect");
 $row=mysqli_fetch_array($edit);
?>
<!DOCTYPE html>
<html>
<head>



<style>
.styled-table {
    border-collapse: collapse;
    margin: 24px 0;
    font-size: 0.9em;
    font-family: 'Poppins', sans-serif;;

    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #0d3073;
    color: #ffffff;
    text-align: center;
}

.styled-table th,
.styled-table td {
    padding: 4px 15px;
}



    </style>
<br><BR><BR><BR>

     <body>  

     <center> 
         <h2>CONNECTION REQUESTS</h2><br>
        <div class="panel-heading"> </div>
        <div class="panel-body" >
        <div class="row">
              <form method="post" enctype="multipart/form-data">
              
         
            
          
<div class="container">
  
                <table class="styled-table" border="2" style="margin-left:10px;">
                <thead>
                    <tr>
                  
                    <th width="5%">Applicant</th>
                
                   
              
                    <th>District</th>
                    <th>Village</th>
                    <th>Date</th>
                    <th>Purpose</th>
                    <th>Applicant Status</th>
                    <th>Ownership Proof</th>
                    <th>Identity Proof</th>
                    <th>Email</th>
                    <th>Verify</th>
                    <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                          <?php  
       $d=$row['Section'];
                          $result = mysqli_query($con,"SELECT * FROM `newconnect` where Section='$d'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr>  
                               
                               <td><?php echo $row["username"]; ?></td>  
                            
                              
                               <td><?php echo $row["district"]; ?></td> 
                               <td><?php echo $row["Section"]; ?></td> 
                               <td><?php echo $row["date"]; ?></td> 
                               <td><?php echo $row["purpose"]; ?></td> 
                               <td><?php echo $row["appstatus"]; ?></td>
                               <td><a href="pdf/<?php echo $row["p_ownership"]; ?>">Proof</a></td>
                               <td><a href="pdf/<?php echo $row["p_identity"]; ?>">Proof</a></td>
                              <td> <input type="submit" id="compose" style="background:white;color:black;padding:4px 10px" value='<?php echo $row["email"];?>' name="compose"></a></td>
                              <td><button type="button" style="height: 30px;" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a  style="color:white;" href="verify_con.php?del=<?php echo $row["n_id"];?> ">Verify</a></button></td>

                              <td><?php echo $row["status"]; ?></td>
                          </tr>  


                                            <?php
                    if(isset($_POST["compose"]))
                    {
                        $digits = 13;
                       $de= rand(pow(10, $digits-1), pow(10, $digits)-1);
                    $id = $_POST["compose"];
                    $subject="New Connection Request Verified"; 
                    $message= "Dear Sir/Madam,   The documents you submitted for the new connection service are verified. We are glad to add you as our consumer.Your consumer number is: ";
                    $se="You can register on our  KSEB site with this 13 digit consumer number";
                    $f="Click here and register on: ";
                    $link=" https://ksebmanagementsystem.000webhostapp.com";
                    echo ("<script LANGUAGE='JavaScript'>
                    window.open('https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=$id&Subject=$subject&body=$message$de.$se.$f$link', '_blank');
                    </script>");

 
}
?>






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
