
<?php
session_start();
include("Database/connection.php");
$Email =$_SESSION["Email"];



if(isset($_POST["submit"]))
{


  $name=$_POST["name"];
  $email=$_POST["email"];
  $number=$_POST["phone"];
  $section=$_POST["section"];


 
mysqli_query($con,"UPDATE tbl_employreg SET `Name`='$name',`Email`='$email',`phone`='$number',`Section`='$section' WHERE `Email`='$Email'");
header("location:sub_profile.php");
}



?>