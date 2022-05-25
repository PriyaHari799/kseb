
  <?php
  if (isset($_POST['rbtn'])) {
    include("Database/connection.php");
    $id = $_POST['rbtn'];
    $sval = $_POST['status'];
    $sql = "UPDATE `complaints` SET `status`= '$sval' WHERE c_id = $id";
    $result = mysqli_query($con, $sql);
    header("location:vcomplaints.php");

  }
  ?>