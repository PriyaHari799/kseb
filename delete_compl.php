
<?php
include("includes/uheader.php");
include("Database/connection.php");
$id=$_GET["del"];
$edit=mysqli_query($con, "DELETE FROM `complaints` where c_id='$id'");
header('location:allcompl.php');
?>
