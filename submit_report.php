

<?php
include("includes/emp_header.php");

if(extract($_POST))
{

    include("Database/connection.php");
    $id = $_POST['rbtn'];


$ow=$_FILES['ownership']['name'];
$ow_type=$_FILES['ownership']['type'];
$ow_size=$_FILES['ownership']['size'];
$ow_tem_loc=$_FILES['ownership']['tmp_name'];
$ow_store="pdf/".$ow;
move_uploaded_file($ow_tem_loc,$ow_store);







    $sql = "UPDATE `tbl_metervisit ` SET `report`= '$ow' WHERE v_id = $id";
    $result = mysqli_query($con, $sql);
    header("location:meter_report.php");

  }
  ?>




<!DOCTYPE html>

<head>
	
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
<style>

body{

  background-color:#ffcccc;


}
</style>

<body>
<br><br>
<div class="container">

  <br>
    <div class="title">Submit Report</div><br><br>
    <div class="content">
<form method="post" action="#" name="frmcstreg" onSubmit="return validatecstreg()" enctype="multipart/form-data">

          <div class="input-box">
            <span class="details">Choose Report</span>
            <input type="file" name="ownership" id="ownership"  placeholder="Report">
          </div>

          <div class="button">
            <input type="submit" value="Submit" name="rbtn" id="rbtn">
            
          </div>

      </form>
    </div>






</body>