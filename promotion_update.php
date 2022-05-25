
<!--
 // if (isset($_POST['rbtn'])) {
  //  include("Database/connection.php");
  //  $id = $_POST['rbtn'];
  
   // $sql = "UPDATE `tbl_employreg` SET `Type_Id`= '6' WHERE emp_id = '$id'";
   // $result = mysqli_query($con, $sql);
   // header("location:view_promotion_update.php");

 // }
  
  


<?php
include("Database/connection.php");


$id=$_GET["del"];
$edit=mysqli_query($con, "UPDATE `tbl_employreg` SET `Type_Id`= 6 WHERE emp_id = '$id'");
echo ("<script LANGUAGE='JavaScript'>
          window.alert('success');
          window.location.href='view_promotion_update.php';
          </script>");

?>
