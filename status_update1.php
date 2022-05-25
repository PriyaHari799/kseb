
  <?php
  if (isset($_POST['rbtn'])) {
    include("Database/connection.php");
    $id = $_POST['rbtn'];
    $sval = $_POST['status'];
    $sql = "UPDATE `tbl_leave` SET `status`= '$sval' WHERE l_id = $id";
    $result = mysqli_query($con, $sql);
    header("location:view_emp_leave.php");

  }
  ?>