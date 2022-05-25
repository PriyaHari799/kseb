<?php
session_start();
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
     
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">KSEB</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="overhome.php" class="">
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
     
      <div class="profile-details">
        <img src="images/images_.png" alt="">
        <span class="admin_name"><?php
			echo $_SESSION["Email"];
		  ?></span>
        
      </div>
    </nav>



    
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

</body>
</html>