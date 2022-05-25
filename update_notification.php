
  <?php

include("Database/connection.php");

$sql = "UPDATE `tbl_notifications` SET `status`= '1'";
$result = mysqli_query($con, $sql);
header("location:index.php");


?>