<?php
include("Database/connection.php");
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $sql = "SELECT `consnumber` FROM `tbl_usereg` WHERE `reg_id` = '$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
}
?>
    <option value="<?php echo $row["consnumber"];?>"><?php echo $row["consnumber"];?></option>