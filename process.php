<?php

include("includes/overheader.php");
include("Database/connection.php");

if(isset($_POST['submit_data'])){

$name=$_POST['name'];
$section=$_POST['section'];
$email=$_POST['email'];
$title=$_POST['Article_title'];

$content=$_POST['Article_content'];

if(!empty($title)|| !empty($content)){

    $sql="INSERT INTO `tbl_report`(`name`, `section`, `email`, `title`, `record`, `date`, `report`, `status`) VALUES ('$name', '$section', '$email', '$title', '$content', curdate(), 'No records Found','Not Uploaded');";
$execute= mysqli_query($con,$sql);

if(!$execute){
    echo "Failed";
    exit();
}else{

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success');
    window.location.href='view_report.php';
    </script>");
    exit();

}



}else{

header('location:overseer_report.php?emptyFields');
exit();
}






}else{

    header('location:overseer_report.php?invalidRequest');
    exit();
}






?>
