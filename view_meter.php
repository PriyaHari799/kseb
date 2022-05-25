
<?php
session_start();
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
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Sub-Engineer </title>
    <link rel="stylesheet" href="stylesheet/style3.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
  
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: 'Poppins', sans-serif;;
    width:100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #0d3073;
    color: #ffffff;
    text-align: center;
}

.styled-table th,
.styled-table td {
    padding: 5px 40px;
}


.search-container{
height:50px;
use float:right;
text-align: right;
}
  </style>


   </head>
   <body>
  <div class="sidebar">
  <div class="logo-details">
  <i class="fa fa-lightbulb-o" style="font-size:36px"></i>
      <span class="logo_name">KSEB</span>
    </div>
      <ul class="nav-links">
      <li>
          <a href="sub_profile.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="sub_change_pass.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Change Password</span>
          </a>
        </li>
        
        <li>
          <a href="apply_leave_sub.php">
            <i class='fa fa-user-circle' ></i>
            <span class="links_name">Apply Leave</span>
          </a>
        </li>
        
        <li>
          <a href="view_meter.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">View Meter Readers</span>
          </a>
        </li>

        <li>
          <a href="view_overseer.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">View Overseers</span>
          </a>
        </li>

        

        <li>
          <a href="meter_enter_status.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Meter Shifting status</span>
          </a>
        </li>
       
        <li>
          <a href="view_reports.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Reports</span>
          </a>
        </li>
        
       
        
       
        <!-- <li>
          <a href="gen_notifications.php">
            <i class='fa fa-id-badge' ></i>
            <span class="links_name">Post News</span>
          </a>
        </li> -->
        
       
        
       
        
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Sub-Engineer Portal</span>
      </div>
     


      <div class="profile-details">
      <img src="images/images_.png" alt="">
        <span class="admin_name"><?php
			echo $_SESSION["Email"];
		  ?></span>
       
      </div>
    </nav>
   <body>

   
<?php
 $username =$_SESSION["Email"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_employreg  where Email='$username'");
 $row=mysqli_fetch_array($edit);
?>

<br><br><br><BR><br>    
   <center><H2>METER READERS</H2></center>



<div class="container">
  
<table class="styled-table" border="2" style="margin-left:30px;">
                <thead class="thead-dark">
                    <tr>
                  
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Section</th>
                    <th>Address</th>

                    
                    </tr>
                </thead>
                    <tbody>
                          <?php  
         include("Database/connection.php");
         $d=$row['Section'];
                          $result = mysqli_query($con,"SELECT * FROM `tbl_employreg` where `Type_Id`=1 and Section='$d'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr style="background-color: white;">
                               
                               <td><?php echo $row["Name"]; ?></td>  
                               <td><?php echo $row["Email"]; ?></td>
                               <td><?php echo $row["phone"]; ?></td>
                               <td><?php echo $row["Section"]; ?></td> 
                               <td><?php echo $row["Address"]; ?></td> 
                              
                               
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








    </body>
</html>

<script type="application/javascript">
  function validatecstreg()
  {
  
  var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
  var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
  var numericExpression = /^\d{4}$/; //Variable to validate only numbers
  var numericExp = /^\d{13}$/; //Variable to validate only numbers
  

 if(document.frmcstreg.search.value == "")
    {
      alert("Enter the section to search Meter Readers.");
      document.frmcstreg.search.focus();
      return false
      
    }	


    else
    {
      return true;
    }
  }
  
</script>
    
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<?php
    }
    ?>