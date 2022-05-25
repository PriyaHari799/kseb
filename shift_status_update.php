
  <?php
  if (isset($_POST['rbtn'])) {
    include("Database/connection.php");
    $id = $_POST['rbtn'];
    $sval = $_POST['status'];
    $sql = "UPDATE `tbl_metershift` SET `status`= '$sval' WHERE c_id = $id";
    $result = mysqli_query($con, $sql);
    header("location:meter_enter_status.php");

  }
  ?>