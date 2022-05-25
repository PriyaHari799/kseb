
  <?php

    include("Database/connection.php");
    $id = $_GET['del'];
    $username=$_SESSION["username"];
    $sql = "UPDATE `tbl_billdetails` SET `status`= 'Completed',`date`=curdate() WHERE bill_id = $id ";
    $result = mysqli_query($con, $sql);
    header("location:paymentgateway.php");


  ?>