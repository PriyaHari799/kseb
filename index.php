<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KSEB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

  <link href="assets/css/about.css" rel="stylesheet">
  <link href="assets/css/contact.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="stylesheet/popup.css" rel="stylesheet">





</head>

<body>



  
  <header id="header" class="fixed-top d-flex align-items-center header-white">
    <div class="container d-flex align-items-center header-white">
      <img src="images/log.png" alt="" class="img-fluid" height="5%" width="5%">
      <h1 class="logo me-auto"><a href="index.php">KSEB</a></h1>
      

      <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-white">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 bg-white">



<form action="view_noti.php">

        <li class="nav-item"><b><button type="button" class="btn btn-light" onclick="openForm()" name="button" class="btn btn-light">
   <i class="bi bi-bell"style="font-size:20px; color:red;"></i>
  
   <?php 

include("Database/connection.php");

$result=mysqli_query($con,"SELECT count(message) as total from tbl_notifications where status='0'");
if($data=mysqli_fetch_assoc($result)){
echo $data['total'];
}else
 echo "0"; 
?>

  </span>
</button></b></a></li>
 
</form>
<div class="form-container"> 
<div class="form-popup" id="myForm">
<h3>Latest News</h3>
<?php 
include("Database/connection.php");
$result=mysqli_query($con,"SELECT * from tbl_notifications where status='0'");



echo "<table class='table table-bordered'>
<tr>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr bgcolor='white' type='dot'>";

echo "<td style='height:20px;width:500px;'>" . $row['message'] . "</td>";
echo "</tr>";
}
echo "</table>";

 
?>
<?php

$sql = "SELECT * from tbl_notifications where status='0'";
$result = mysqli_query($con, $sql);
$rows=mysqli_fetch_array($result);
?>

    <button type="button" class="btn btn-light"  onclick="closeForm()"><a href="update_notification.php">Close</a></button>
 
</div>

</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




          <li class="nav-item"><a href="#hero"><b>Home</b></a></li>
          <li><a class="nav-item" href="#about"><b>About</b></a></li>
          <li><a class="nav-item" href="#services"><b>Services</b></a></li>
          <li><a class="nav-item" href="#contact"><b>Contact</b></a></li>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <li><div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Registration
            <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="addcomreg.php">Consumer</a></li>
                  <li><a href="employereg.php">Employee</a></li>
                </ul>
            </div>
          </li>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <li><div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" name="lbtn" type="button" data-toggle="dropdown">Login
            <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="login.php" name="clogin">Consumer</a></li>
                  <li><a href="emplogin.php">Employee</a></li>
                </ul>
            </div>
        </li>
          
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>


  
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1><B>KERALA STATE ELECTRICITY BOARD</B></h1>
      <h2>Welcome to the new Era of KSEB</h2>
      
      <button type="button" class="btn btn-outline-light btn-lg"><a href="#services">GET NEW CONNECTION</a></button>
    </div>
  </section>

  <main id="main">

   
    <section id="about" class="about">

      <div class="about-section">
        <h1><b>About Us</b></h1>
        <h4>Our mission is to provide quality electricity to customers adequately, safely, sustainably at affordable cost.</h4>
        <h5>"KSEB Limited envision to be the best power utility in India."</h5>
      </div>
    
      <div class="container">
        <div class="row">
      
      <h2><b>Our Core Values</b></h2><br>
                <div class="col-sm">
                  <div class="card text-white bg-secondary mb-3" style="width: 20rem; height: 19rem;">
                    <div class="card-body">
                      <h5 class="card-title"><b>Transperancy</b></h5>
                     <br>
                      <p class="card-text">As an independent third party, we verify all of the information you submit.Beyond that, we do not cull your data.All your personal and banking inforamtion is hidden to others.</p>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="card text-white bg-secondary mb-3" style="width: 20rem; height: 19rem;">
                    <div class="card-body">
                      <h5 class="card-title"><b>Control</b></h5>
                     <br>
                      <p class="card-text">About 35,000 employees are ready to serve services.You can access all the services by registering on this site.Have different wings like finance wings,generation wings etc to manage services. You can consume your time by get services through online.</p>
                      
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="card text-white bg-secondary mb-3" style="width: 20rem; height: 19rem;">
                    <div class="card-body">
                      <h5 class="card-title"><b>Efficiency</b></h5>
                     <br>
                      <p class="card-text">Providing fast and 24/7 service.The KSEB's billing efficiency is rated as moderate, around 86%. The financial risk profile is also rated moderate.Directors head the profit centers. There is a Corporate Office to co-ordinate and control the activities of KSEB Limited.</p>
                      
                    </div>
                  </div>
                </div>
          </div>
      </div>
   
      
    </section>

    <br><br><br><br><br><br>
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header"><br><CENTER>
          <h3>SERVICES</h3>
          <h4>KSEB SERVICES WITHIN YOUR FINGER POINTS.</h4>
            <h5>You need to create an account to get these services other than New Connection.</h5>
          </CENTER>
        </header>
<BR><BR>
        <div class="row">

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="login.php">QUICK PAY</a></h4>
              <p class="description"><h6>Pay your Electricity Bill within minutes.</h6></p><br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <div class="icon" style="background: #fff0da;"><i class="bi bi-card-checklist" style="color: #e98e06;"></i></div>
              <h4 class="title"><a href="login.php">COMPLIANT REGISTRATION</a></h4>
              <p class="description"><h6>Mark your Compliants within minutes.</h6></p><br><br>
            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="bi bi-bar-chart" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="newconnection.php">NEW CONNECTION</a></h4>
              <p class="description"><h6>Apply for your New Connection.</h6></p><br><br>
            </div>
         

      </div>

      </div>
      <br><br><br><br><br><br><br><br><br>
    </section>

 
    <section id="contact" class="call-to-action">
      <div class="container" data-aos="zoom-out">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3 class="cta-title"></h3>


            <p class="cta-text"><h1>Contact Us</h1></p>

            <div class="container">
              


            <div class="card" style="width: 25rem; height: 450px;">
  <div class="card-body">
  <img src="images/coperate.jpg" width="80%" ><br><br>
    <h5 class="card-title">Corporate Headquarters</h5>
    <h6 class="card-subtitle mb-2 text-muted">Kerala State Electricity Board Ltd.,  </h6>
    <p class="card-text">
Vydyuthi Bhavanam,<br>
Pattom, Thiruvananthapuram,<br>
PIN - 695004,<br>
Kerala,<br> INDIA.
</p>
Customer Care Center: 1912, +91 471 2555544
  </div>
</div>
            </div>
          </div>
          <div class="col-lg-3 cta-btn-container text-center"><br><br>
            <a class="cta-btn align-middle" href="#"><img src="images/images.png" width="50%" ></a><br>Call Us on 1912
          </div>
        </div>

      </div>
    </section>

 <br>
      


    </main>

  
  <footer id="footer" class="section-bg">
    <div class="container">
      <div class="copyright">
        
      </div>
      <div class="credits">
       
        Designed by <a href="">priyahari@mca.ajce.in</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  
  <script src="assets/js/main.js"></script>

  <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>

</html>