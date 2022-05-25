
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


<?php
 $username =$_SESSION["Email"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_employreg  where Email='$username'");
 $row=mysqli_fetch_array($edit);
?>




<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Overseer </title>
    <link rel="stylesheet" href="stylesheet/style3.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
<style>

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: 'Poppins', sans-serif;;
width:50%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #0d3073;
    color: #ffffff;
    text-align: center;
}

.styled-table th,
.styled-table td {
    padding: 6px 16px;
}


    </style>






   </head>
<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">KSEB</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="overhome.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="overseer_profile.php" class="">
          <i class='bx bx-user' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="overseer_change_pass.php" class="">
          <i class='bx bx-cog' ></i>
            <span class="links_name">Change Password</span>
          </a>
        </li>

        <li>
          <a href="over_apply_leave.php">
          <i class="fa fa-bell-o" style="font-size:17px"></i>
            <span class="links_name">Apply Leave</span>
          </a>
        </li>


        <li>
          <a href="viewcon.php">
          <i class='bx bx-list-ul' ></i>
            <span class="links_name">View Consumers</span>
          </a>
        </li>
        <li>
          <a href="vcomplaints.php">
          <i class="fa fa-cloud-download" style="font-size:18px"></i>
            <span class="links_name">Complaint Status</span>
          </a>
        </li>



      
        
        <li>
          <a href="overseer_report.php">
         
          <i class="fa fa-edit" style="font-size:17px"></i>
            <span class="links_name">Report Generation</span>
          </a>
        </li>

        


     
        
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Logout</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">OVERSEER PORTAL</span>
      </div>
     
      <form action="search_section.php" method="post" name="frmcstreg" onSubmit="return validatecstreg()">
      <div class="">
     
        <input type="text" placeholder="Search Complaints.." name="search" style="width:250px; height: 40px;">
       <button type="submit" name="submit" class="btn btn-primary" value="submit">Search</button> </i>
      
      </div>
      </form>




      <div class="profile-details">
        <img src="images/images_.png" alt="">
        <span class="admin_name"><?php
			echo $_SESSION["Email"];
		  ?></span>
        
      </div>
    </nav>



<br><br><br>
   <div class="card" style="width:400px;">
  <div class="card-body" style="color:red;">
You can search your nearby complaints using your section name.
</div>
</div>



<center><H3>ENTER COMPLAINT STATUS</H3></center>
<HR>

<div class="container">
  
<table class="styled-table" border="2" style="margin-left:30px;">
                <thead class="thead-dark">
                    <tr>
                  <th>Consumer Name</th>
                    <th>Consumer Number</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                    <th>District</th>
                    <th>Section</th>
                    <th>Description</th>
                    <th>Enter Status</th>
                    <th>Status</th>
                    
                   
                    </tr>
                    </thead>
      <tbody>

        <?php
        include("Database/connection.php");
        $d=$row['Section'];
        $sql = "SELECT * FROM complaints where village='$d' ORDER BY c_id DESC";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
              <tr>
          
              <td scope='row'>" . $row['username'] . "</th>
              <td scope='row'>" . $row['consumer'] . "</th>
              <td scope='row'>" . $row['mobile'] . "</th>
              <td scope='row'>" . $row['date'] . "</th>
              <td scope='row'>" . $row['district'] . "</th>
              <td scope='row'>" . $row['village'] . "</th>
              <td scope='row'>" . $row['description'] . "</th>

              <td>
                            
              <form action='status_update.php' method='POST'>
              
              <select class='custom-select' id='inputGroupSelect01' name='status'>
                  <option selected>Choose</option>
                  <option value='Pending'>Pending</option>
                  <option value='Recieved'>Recieved</option>
                  <option value='Progressing'>Progressing</option>
                  <option value='Completed'>Completed</option>
                 
                </select>
                <button class='btn btn-danger' value='" . $row['c_id'] . "' name=rbtn>Update</button>
                
              </form>

              </td>




              <td scope='row'>";
            if ($row['status'] == 'Pending') {
              echo "<p class='card-text text-danger'><b>PENDING</b></p>";
            } else if ($row['status'] == 'Recieved') {
              echo "<p class='card-text text-secondary'><b>RECIEVED</b></p>";
            } else if ($row['status'] == 'Progressing' ) {
              echo "<p class='card-text text-warning'><b>PROGRESSING</b></p>";
            } else if ($row['status'] == 'Completed') {
              echo "<p class='card-text text-success'><b>COMPLETED</b></p>";
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
<?php
}
?>

  
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




