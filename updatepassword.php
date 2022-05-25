
<?php

include("includes/uheader.php");
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
$edit=mysqli_query($con, "SELECT * FROM tbl_usereg where username='$username'");
$row=mysqli_fetch_array($edit);


if(isset($_POST["submit"]))
{

  $passw=$_POST["upass"];
  
  
  mysqli_query($con,"UPDATE tbl_usereg SET `password`='$passw' WHERE username='$username'");

header("location:viewprofile.php");
}

?>

<html>
<body>
<center><br>
  <h3>Update Your Password</h3>
<div class="card" style="width: 40rem;">
<center>
<img src="images/fr.png" class="" alt="..." height="100px" width="100px">
</center>
<form action="#" method="POST" name="frmcstreg" onSubmit="return validatepass()">
<table class="table">

<tr>
    <td>Old Password : </td>
    <td><input type="password" name="oldpass" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $row['password']?>" readonly/> </td>
</tr>
<tr>
    <td>New Password : </td>
    <td><input type="password" name="upass" class="form-control" id="exampleInputPassword1" placeholder="Password" value=""/> </td>
</tr>

<tr>
    <td>Confirm Password : </td>
    <td><input type="password" name="confirmpass" class="form-control" id="exampleInputPassword1"  placeholder="Confirm Password" value=""/></td>
</tr> 
<tr>
<td><a href="editprofile.php" class="btn btn-primary" style="width: 50%;"><i class='fas fa-angle-double-left'></i>Back</a></td>
    <td><input type="submit" class="btn btn-primary" name="submit" value="Update"/></td>
</tr>

</table>
</form>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>



<script type="application/javascript">
  function validatepass()
  {

    var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
    var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
    var numericExpression = /^\d{10}$/; //Variable to validate only numbers
   
    if(document.frmcstreg.upass.value == "")
    {
      alert("Password should not be empty..");
      document.frmcstreg.upass.focus();
      return false;
    }     
    else if(document.frmcstreg.upass.value.length <= 8)
    {
      alert("Password must have more than or equal to 8 characters.");
      document.frmcstreg.upass.focus();
      return false;
    }
    else if(document.frmcstreg.upass.value.length > 16)
    {
      alert("Password length should be less than 16 characters.");
      document.frmcstreg.upass.focus();
      return false;
    }   
    else if(document.frmcstreg.confirmpass.value == "")
    {
      alert("Confirm password should not be empty.");
      document.frmcstreg.confirmpass.focus();
      return false;
    }   
    
    else if(document.frmcstreg.oldpass.value == document.frmcstreg.upass.value)
    {
      alert("Kindly enter a new password.");
      document.frmcstreg.oldpass.focus();
      return false;
    }  
    
    else if(document.frmcstreg.upass.value != document.frmcstreg.confirmpass.value)
    {
      alert("New password and confirm password not matching.");
      document.frmcstreg.confirmpass.focus();
      return false;
    }  

    else{
      return true;
    }
}
</script>

<?php
}

?>
</html>