
  <?php

include("Database/connection.php");
$id = $_GET['del'];

$sql = "UPDATE `newconnect` SET `status`= 'Verified' WHERE n_id = $id ";
$result = mysqli_query($con, $sql);
header("location:conrequests.php");


?>