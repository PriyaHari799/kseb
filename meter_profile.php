
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

    <body>    <br><br> 
<div class="mt-5">
<center><h2>Your Profile</h2></center>
  <div class="card mx-auto text-center" style="width: 25rem;">
    
 


    <div class="card-body">
    <img src="images/fr.png" class="" alt="..." height="100px" width="100px" >
      <?php
    
      include("Database/connection.php");
      //$uid = $_SESSION["id"];
      $Email =$_SESSION["Email"];
      $sql="SELECT * FROM tbl_employreg WHERE Email='$Email'";
      $result = mysqli_query($con, $sql);
      $rows = mysqli_num_rows($result);
      if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
         
          echo "<p class=card-text> Name: " . $row['Name'] . "</p>";
          echo "<p class=card-text> Email: " . $row['Email'] . "</p>";
          echo "<p class=card-text> Address: " . $row['Address'] . "</p>";
          echo "<p class=card-text> Address: " . $row['Section'] . "</p>";
          echo "<p class=card-text> Phone: " . $row['phone'] . "</p>";
         

      

        }
      }
?>
 <br>
 <a href="meter_edit_profile.php" class="btn btn-primary" style="width: 50%;">Edit profile</a>
    </div>
  </div>
  </div>


           
    
    </div>
           
            
    </body>

    </html>


<?php
      }
?>