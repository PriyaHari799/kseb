
<?php
session_start();
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
    </nav>

    </body>
</html>


    
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

