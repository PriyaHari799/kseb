
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
    <title> Admin </title>
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

   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">ADMIN PANEL</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="adminpanel.php" class="active">
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

      <form action="search2.php" method="post" name="frmcstreg" onSubmit="return validatecstreg()">
      <div class="">
     
        <input type="text" placeholder="Search Employers Here..." name="search" style="width:250px; height: 40px;">
       <button type="submit" name="submit" class="btn btn-primary" value="submit">Search</button> </i>
      
      </div>
      </form>



      <div class="profile-details">
        <img src="images/images_.png" alt="">
        <span class="admin_name">Admin</span>
        
      </div>

     
    </nav>
 
  



<body>
<br><br><br><br>


<center><H2>EMPLOYERS</H2></center>



<div class="container mb-4">
  
<table class="table table-bordered table-bordered">
                <thead class="thead-dark">
                    <tr>
                  
                    <th>Employee Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Section</th>
                    
                    </tr>
                </thead>
                    <tbody>
                          <?php  
        
                          $result = mysqli_query($con,"SELECT * FROM `tbl_employreg` where `status`=2");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr style="background-color: white">
                               
                               <td><?php echo $row["Name"]; ?></td>  
                               <td><?php echo $row["Address"]; ?></td> 
                               <td><?php echo $row["Email"]; ?></td> 
                               <td><?php echo $row["phone"]; ?></td> 
                               <td><?php echo $row["Section"]; ?></td>
                              
                               
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

<script type="application/javascript">
  function validatecstreg()
  {
  
  var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
  var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
  var numericExpression = /^\d{4}$/; //Variable to validate only numbers
  var numericExp = /^\d{13}$/; //Variable to validate only numbers
  

 if(document.frmcstreg.search.value == "")
    {
      alert("Enter the section to search Employers.");
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



