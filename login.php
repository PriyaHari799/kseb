
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel='stylesheet' href='stylesheet/login.css' type='text/css' />
    <style>
      
      body{
      background-image:url('images/intro-bg.jpg');
      color: rgb(7, 1, 1);
      font-family: 'Poppins',sans-serif;

      }
      .navbar-brand{
        font-size: 40px

      }
    </style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a href="index.php"><button type="button" class="btn btn-primary btn-arrow-left">BACK TO HOME</button></a>

        
</nav>

   </head>

<body>
    <br><br>

  <div class="container">
    <center><img src="images/4.jpg" alt="" class="img-fluid" width="25%" height="25%"></center>
    <div class="title">Login</div>
    <div class="content">
      <form class="login-form" action="addlogin.php" method="post" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Username" name="uname"/>
            <span class="details">Password</span>
            <input type="password" placeholder="Password" name="upass"/>
            <div class="button">
              <input type="submit" value="Login" name="login">
            </div>
          </div>
          <p class="message"><b>Not registered?</b> <a href="addcomreg.php"><b>Create an account</b></a></p>
        </div>
      
        
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
  
    if(document.frmcstreg.uname.value == "")
    {
      alert("Enter username.");
      document.frmcstreg.uname.focus();
      return false;
    }
    else if(!document.frmcstreg.uname.value.match(alphaspaceExp))
    {
      alert("Please enter only letters for username..");
      document.frmcstreg.uname.focus();
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
      alert("Password should have more than 8 characters.");
      document.frmcstreg.upass.focus();
      return false;
    }
    else if(document.frmcstreg.upass.value.length > 16)
    {
      alert("Password should be less than 16 characters.");
      document.frmcstreg.upass.focus();
      return false;
    }		
    
    
    
    else
    {
      return true;
    }
  }
  
  </script> 

  