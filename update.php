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


<?php


$name=$_POST["name"];
$email=$_POST["email"];
$cons=$_POST["cons"];
$number=$_POST["phone"];
$user=$_POST["username"];


$b=$_SESSION['username'];
$abc="select login_id from tbl_login where username='$b'";
$query=mysqli_query($con,$abc);
$result=mysqli_fetch_array($query);
$c=$result['login_id'];

$sq="UPDATE tbl_usereg SET name='$name',email='$email',consnumber='$cons',phone='$number',username='$user' WHERE login_id='$c'";
$a="update tbl_login set username='$user' where username='$b'";
mysqli_query($con,$a);
if(mysqli_query($con,$sq))
{
 $_SESSION['login_id']=$login_id;
  ?>
  <script>alert("profile updated successfully");
  location.href="viewprofile.php";
   exit;
  </script>
  <?php
}
mysqli_close($con);
?>

<?php

    }

  ?>