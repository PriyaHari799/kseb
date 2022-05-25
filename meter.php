


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel='stylesheet' href='stylesheet/meter.css' type='text/css' />
      
<style>

body{
  background-image:url('images/intro-bg.jpg');
  color: #444;
  font-family: 'Poppins',sans-serif;

}

.navbar-brand{

font-size: large;


}



</style>
</head>


<header>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a href="index.html"><button type="button" class="btn btn-primary btn-arrow-left">BACK TO HOME</button></a>

</nav>

</header>



   
   
<body>


    
    <div class="container">
      <center><img src="images/4.jpg" alt="" class="img-fluid" width="15%" height="15%"></center>
    <div class="title">Registration</div>
    <div class="content">
        
          <form method="post" action="metereg.php" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter consumer name" name="names" id="names" >
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter email" name="umail" id="umail" >
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="password" placeholder="Enter Phone number" name="phone" id="phone">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter Password" name="upass" name="upass">
          </div>

          
          

          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter username" name="uname" id="uname">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Enter Password" name="uconfirmpass" id="uconfirmpass" >
          </div>
          
        </div>
        <div class="button">
            <input type="submit" value="Register">
          </div>
          <p class="message">Already have an account?<a href="login.html"><b>Login Here</b></a></p>
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
  var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID
  
    if(document.frmcstreg.names.value == "")
    {
      alert("Your name should not be empty..");
      document.frmcstreg.names.focus();
      return false;
    }
    else if(!document.frmcstreg.names.value.match(alphaspaceExp))
    {
      alert("Please enter only letters for Customer name..");
      document.frmcstreg.names.focus();
      return false;
    }
    
    else if(document.frmcstreg.phone.value == "")
    {
      alert("Kindly enter mobile Number.");
      document.frmcstreg.phone.focus();
      return false
      ;
    }	
    else if(!document.frmcstreg.phone.value.match(numericExpression))
    {
      alert("Kindly enter valid mobile number..");
      document.frmcstreg.phone.focus();
      return false;
    }
    
    
    else if(document.frmcstreg.uname.value == "")
    {
      alert("Username  should not be empty..");
      document.frmcstreg.uname.focus();
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
  
    
    else if(document.frmcstreg.upass.value == "")
    {
      alert("Password should not be empty..");
      document.frmcstreg.upass.focus();
      return false;
    }			
    else if(document.frmcstreg.upass.value.length < 8)
    {
      alert("Password length should be more than 8 characters...");
      document.frmcstreg.upass.focus();
      return false;
    }
    else if(document.frmcstreg.upass.value.length > 16)
    {
      alert("Password length should be less than 16 characters...");
      document.frmcstreg.upass.focus();
      return false;
    }		
    else if(document.frmcstreg.uconfirmpass.value == "")
    {
      alert("Confirm password should not be empty..");
      document.frmcstreg.uconfirmpass.focus();
      return false;
    }		
    else if(document.frmcstreg.upass.value != document.frmcstreg.uconfirmpass.value)
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