
<?php
session_start();
include("Database/connection.php");
if(isset($_SESSION["id"])!=session_id())
{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='login.php';
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
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <link rel="stylesheet" href="stylesheet/style3.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">ADMIN PANEL</span>
    </div>
    
      <ul class="nav-links">
        <li>
          <a href="adminpanel.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="view_consumers.php">
            
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">View Consumers</span>
          </a>
        </li>
        <li>
          <a href="view_employers.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">View Employers</span>
          </a>
        </li>
        <li>
          <a href="add_employers.php">
          <i class='bx bx-box' ></i>
            <span class="links_name">Add Employers</span>
          </a>
        </li>
      
        <li>
          <a href="add_category.php">
          <i class='bx bx-box' ></i>
            <span class="links_name">Add Category</span>
          </a>
        </li>
      
       

        <li> 
          <a href="gene_notification.php">
         
          <i class='fa fa-id-badge' ></i>
            <span class="links_name">Post News</span>
          </a>
        </li>




     <!--   <li> 
          <a href="view_promotion_update.php">
         
          <i class='fa fa-id-badge' ></i>
            <span class="links_name">Change Position</span>
          </a>
        </li>
  -->

     
        
          
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
        <span class="dashboard">Dashboard</span>
      </div>
     
      <div class="profile-details">
        <img src="images/images_.png" alt="">
        <span class="admin_name">Admin</span>
        
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Consumers</div>
            <div class="number">

            <?php 

            include("Database/connection.php");
                        
            $result=mysqli_query($con,"SELECT count(reg_id) as total from tbl_usereg");
            $data=mysqli_fetch_assoc($result);
            echo $data['total'];
                          

            ?>
            </div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          
        </div>

        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Employers</div>
            <div class="number">

            <?php 

        include("Database/connection.php");
                    
        $result=mysqli_query($con,"SELECT count(emp_id) as total from tbl_employreg");
        $data=mysqli_fetch_assoc($result);
        echo $data['total'];
                      

        ?>



            </div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Employee Types</div>
            <div class="number">


            <?php 

          include("Database/connection.php");
                      
          $result=mysqli_query($con,"SELECT count(Type_Id) as total from tbl_type");
          $data=mysqli_fetch_assoc($result);
          echo $data['total'];
                        

          ?>

            </div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Connection Requests</div>
            <div class="number">

            <?php 

          include("Database/connection.php");
                      
          $result=mysqli_query($con,"SELECT count(n_id) as total from newconnect");
          $data=mysqli_fetch_assoc($result);
          echo $data['total'];
                        

?>
         </div>
            <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          
        </div>
      </div>

      
    </div>
  </section>

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
<?php
    }
    ?>