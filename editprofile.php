
<?php
include("includes/uheader.php");
include("Database/connection.php");
if(isset($_SESSION["id"])!=session_id())
{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='login.html';
      	</script>");
  	}
	else
  	{
?>

<html>
    <head>

    <link rel="stylesheet" href="stylesheet/style1.css">
    <style>

body {
  background-image: url("images/shome.jpg");
  background-color:#cce0ff;
}
    </style>
</head>
<body>
<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-align-left"></i>
                        
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="color:Red;">HELLO,  <?php
			echo $_SESSION["username"];
		  ?></span>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                        <a href="userhome.php"><button type="button" class="btn btn-primary btn-arrow-left"><i class='fas fa-angle-double-left'></i>BACK TO HOME</button></a>
                            </li>&nbsp;&nbsp;

                            <li class="nav-item">
                            <a href="logout.php"><button class="btn btn-primary"><B>LOGOUT</B><i class='fas fa-angle-double-right'></i></button></a>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </nav>



<?php

include("Database/connection.php");
$username =$_SESSION["username"];
$edit=mysqli_query($con, "SELECT * FROM tbl_usereg  where username='$username'");
$row=mysqli_fetch_array($edit);


if(isset($_POST["submit"]))
{


  $name=$_POST["name"];
  $email=$_POST["email"];
  $number=$_POST["phone"];


 
mysqli_query($con,"UPDATE tbl_usereg SET `name`='$name',`email`='$email',`phone`='$number' WHERE username='$username'");
header("location:viewprofile.php");
}



?>

<html>
<BR>
<body>

    <center>
    <h3>Edit Your Profile</h3>
<div class="card" style="width: 40rem;">

<center>
<img src="images/fr.png" class="" alt="..." height="100px" width="100px">

    
</center>

<form action="#" method="POST" name="frmcstreg" onSubmit="return validatecstreg()">
<table class="table">
<tr>
    <td>Name:</td>
    <td><input type="text" name="name" class="form-control" id="exampleInputPassword1" value="<?php echo $row['name']?>"/> </td>
</tr>

<tr>
    <td>Email:</td>
    <td><input type="text" name="email" class="form-control" id="exampleInputPassword1" value="<?php echo $row['email']?>"/></td>
</tr>


 
 
<tr>
    <td>Phone number:</td>
    <td><input type="number" name="phone" class="form-control" id="exampleInputPassword1" value="<?php echo $row['phone']?>"/></td>
</tr>




<tr>
    <td><a href="viewprofile.php"><button type="button" class="btn btn-primary btn-arrow-left"><i class='fas fa-angle-double-left'></i>Back</button></a></td>
    <td><input type="submit"  class="btn btn-primary" name="submit" value="Edit"/></td>
  
</tr>

</table>
</form>

</center>


</body>



<script type="application/javascript">
  function validatecstreg()
  {
  
  var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
  var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
  var numericExpression = /^\d{10}$/; //Variable to validate only numbers
  var numericExp = /^\d{13}$/; //Variable to validate only numbers
  var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID
  
    if(document.frmcstreg.name.value == "")
    {
      alert("Customer name should not be empty..");
      document.frmcstreg.name.focus();
      return false;
    }
    else if(!document.frmcstreg.name.value.match(alphaspaceExp))
    {
      alert("Please enter only letters for Customer name..");
      document.frmcstreg.name.focus();
      return false;
    }
    
    else if(document.frmcstreg.email.value == "")
    {
      alert("Kindly enter Email ID..");
      document.frmcstreg.email.focus();
      return false;
    }		
    else if(!document.frmcstreg.email.value.match(emailExp))
    {
      alert("Kindly enter Valid Email ID.");
      document.frmcstreg.email.focus();
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

 
    else
    {
      return true;
    }

  }



    </script>
</html>


<?php
	}
?>
		