<?php
session_start();
 include("Database/connection.php");
 $_SESSION["id"]=session_id();

 if(isset($_POST["password"]))
    {
     include 'Database/connection.php'; 
   $name=$_POST["names"];
   $uname=$_POST["uname"];
   $email=$_POST["umail"];
   $section=$_POST["section"];
   $password=$_POST["password"];
   $cons=$_POST["consumernum"];
   $phone=$_POST["phone"];
      $query = "SELECT * FROM tbl_usereg WHERE username = '$uname'";
      $result1 = mysqli_query($con, $query);
      if(mysqli_num_rows($result1))
      {
        
		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Registration failed. Username exists');
        window.location.href='addcomreg.php';
      </script>");
      }
      else
      {
        if(isset($_POST["register"]))
        {
          $sql = "INSERT INTO `tbl_usereg`(`name`, `email`, `consnumber`, `phone`, `Section`, `username`, `password`) VALUES ('$name','$email','$cons','$phone','$section','$uname','$password')";
          
		  $res = mysqli_query($con, $sql);
      
        }
      }
    }
?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
<style>

body{
  background-image:url('images/intro-bg.jpg');
  color: #444;
  font-family: 'Poppins',sans-serif;
}

header{

background-color: white;

}
</style>

   </head>
   

   <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a href="index.php"><button type="button" class="btn btn-primary btn-arrow-left">BACK TO HOME</button></a>
    
    </nav>
    
    </header>

<body>
    
    <div class="container">
    <center><img src="images/4.jpg" alt="" class="img-fluid" width="10%" height="10%"></center>
    <div class="title">Registration</div>
    <div class="content">
        
      <form method="post" action="addcomreg.php" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter consumer name" name="names" id="names">
          </div>

          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter username" name="uname" id="uname">
          </div>

          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter email" name="umail" id="umail">
          </div>
          <div class="input-box">
            <span class="details">Section</span>
            <input type="text" placeholder="Enter your Section" name="section" id="section">
          </div>
          <div class="input-box">
            <span class="details">Consumer Number</span>
            <input type="text" placeholder="Enter number" name="consumernum" id="consumernum">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter Password" name="password" id="password">
          </div>
          
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" placeholder="Enter Phone number" name="phone" id="phone">
          </div>
          
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Enter Password" name="uconfirmpass" id="uconfirmpass">
          </div>
          
        </div>
        
        <div class="button">
            <input type="submit" value="Register" name="register">
          </div>


          <p class="message">Already have an account?<a href="login.php"><b>Login Here</b></a></p>
      </form>
    </div>
  </div>

</body>
</html>


<script type="application/javascript">
  function validatecstreg()
  {
  
  var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
  var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
  var numericExpression = /^\d{10}$/; //Variable to validate only numbers
  var numericExp = /^\d{13}$/; //Variable to validate only numbers
  
  var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID
  
    if(document.frmcstreg.names.value == "")
    {
      alert("Customer name should not be empty..");
      document.frmcstreg.names.focus();
      return false;
    }
    else if(!document.frmcstreg.names.value.match(alphaspaceExp))
    {
      alert("Please enter only letters for Customer name..");
      document.frmcstreg.names.focus();
      return false;
    }
    
    else if(document.frmcstreg.umail.value == "")
    {
      alert("Kindly enter Email ID..");
      document.frmcstreg.umail.focus();
      return false;
    }		
    else if(!document.frmcstreg.umail.value.match(emailExp))
    {
      alert("Kindly enter Valid Email ID.");
      document.frmcstreg.umail.focus();
      return false;
    }	
    
    else if(!document.frmcstreg.consumernum.value.match(numericExp))
    {
      alert("Kindly enter Valid Consumer Number.");
      document.frmcstreg.consumernum.focus();
      return false;
    }	
    
    else if(document.frmcstreg.phone.value == "")
    {
      alert("Kindly enter mobile Number.");
      document.frmcstreg.phone.focus();
      return false
      
    }	
    else if(!document.frmcstreg.phone.value.match(numericExpression))
    {
      alert("Kindly enter valid mobile number..");
      document.frmcstreg.phone.focus();
      return false;
    }
    
    
    else if(document.frmcstreg.uname.value == "")
    {
      alert("Username name should not be empty..");
      document.frmcstreg.uname.focus();
      return false;
      
    }
    
    else if(document.frmcstreg.section.value == "")
    {
      alert("Section name should not be empty..");
      document.frmcstreg.section.focus();
      return false;
      
    }
    else if(document.frmcstreg.password.value == "")
    {
      alert("Password should not be empty..");
      document.frmcstreg.password.focus();
      return false;
    }			
    else if(document.frmcstreg.password.value.length < 8)
    {
      alert("Password length should be more than 8 characters...");
      document.frmcstreg.password.focus();
      return false;
    }
    else if(document.frmcstreg.password.value.length > 16)
    {
      alert("Password length should be less than 16 characters...");
      document.frmcstreg.password.focus();
      return false;
    }		
    else if(document.frmcstreg.uconfirmpass.value == "")
    {
      alert("Confirm password should not be empty..");
      document.frmcstreg.uconfirmpass.focus();
      return false;
    }		
    else if(document.frmcstreg.password.value != document.frmcstreg.uconfirmpass.value)
    {
      alert("Password and confirm password not matching...");
      document.frmcstreg.uconfirmpass.focus();
      return false;
    }				
    
    
    else
    {
      return true;
    }
  }
  
  </script> 



<?php
    global $result1;
    if ($result1) {
    echo ("<script LANGUAGE='JavaScript'>window.location.href='login.php'</script>");
    }
            
  ?>
