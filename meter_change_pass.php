
<?php

include("includes/emp_header.php");
include("Database/connection.php");
if(isset($_SESSION["id"])!=session_id())
{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='emplogin.php';
      	</script>");
  	}
	else
  	{
?>

<html>
  
<body><br><br><br><br>


            <?php

include("Database/connection.php");
$Email =$_SESSION["Email"];
$edit=mysqli_query($con, "SELECT * FROM tbl_employreg where Email='$Email'");
$row=mysqli_fetch_array($edit);


if(isset($_POST["submit"]))
{

  $passw=$_POST["upass"];
  
  
  mysqli_query($con,"UPDATE tbl_employreg SET `password`='$passw' WHERE Email='$Email'");

header("location:meter_profile.php");
}

?>

<html>
    <head>
        
<style>
body{


background-color:#ffcccc;

  } 
</style>
</head>
<body>
<center><br>
  <h3>Update Your Password</h3><br>
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
<td><a href="meter_profile.php" class="btn btn-primary" style="width: 50%;"></i>Back</a></td>
    <td><input type="submit" class="btn btn-primary" name="submit" value="Update"/></td>
</tr>

</table>
</form>
</div>

</body>





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