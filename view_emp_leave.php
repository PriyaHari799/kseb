
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








<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
<style>


    </style>

 
<?php
 $username =$_SESSION["Email"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_employreg  where Email='$username'");
 $row=mysqli_fetch_array($edit);
?>


<br><br><br><br>
<center><H3>APPROVE LEAVE</H3></center>
<HR>

<div class="container mb-4">
  
<table class="table table-light border table-bordered">
                <thead class="thead-dark">
                    <tr>
                  <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Description</th>
                    <th>Section</th>
                    <th>Email</th>
                    <th>Enter Status</th>
                    <th>Status</th>
                    
                   
                    </tr>
                    </thead>
      <tbody>

        <?php
      include("Database/connection.php");
      $d=$row['Section'];
        $sql = "SELECT * FROM tbl_leave where section='$d' ORDER BY l_id DESC";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
              <tr>
          
              <td scope='row'>" . $row['name'] . "</th>
              <td scope='row'>" . $row['leave_type'] . "</th>
              <td scope='row'>" . $row['from_date'] . "</th>
              <td scope='row'>" . $row['to_date'] . "</th>
              <td scope='row'>" . $row['description'] . "</th>
              <td scope='row'>" . $row['section'] . "</th>
              <td scope='row'>" . $row['Email'] . "</th>

              <td>
                            
              <form action='status_update1.php' method='POST'>
              
              <select class='custom-select' id='inputGroupSelect01' name='status'>
                  <option selected>Choose</option>
                  <option value='Pending'>Pending</option>
                  <option value='Approved'>Approved</option>
                  
                 
                </select>
                <button class='btn btn-danger' value='" . $row['l_id'] . "' name=rbtn>Update</button>
                
              </form>

              </td>




              <td scope='row'>";
            if ($row['status'] == 'Pending') {
              echo "<p class='card-text text-danger'><b>Pending</b></p>";
            } else if ($row['status'] == 'Approved') {
              echo "<p class='card-text text-success'><b>Approved</b></p>";
            }  else {
            }
            echo "</th>";
            



            //echo "<td scope='row'><a class='btn btn-light' name='mbtn' value='hai' href='adminuserdetail.php?id=" . $row['id'] . "'>Show</a></th>
           echo " </tr>";
          }
        }
        ?>

      </tbody>
    </table>

  </div>


  </body>

  </html>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<?php
    }
    ?>

