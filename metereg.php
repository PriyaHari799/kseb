<?php
session_start();
include("Database/connection.php");
$metername=$_POST['names'];
$email=$_POST['umail'];
$username=$_POST['uname'];
$password=$_POST['upass'];
$confirmpass=$_POST['uconfirmpass'];
$phone=$_POST['phone'];
$usertype='Meter Reader';

$r="select * from tbl_login where username= '$username'";
$re=mysqli_query($con,$r) or die("CONNECTION SCENE");
$num=mysqli_num_rows($re);
if($num>=1)
{

echo "username and password already taken";

}
else
{

$sql="insert into tbl_login(username,password,usertype) values ('$username','$password','$usertype')";
mysqli_query($con,$sql);
$n=mysqli_insert_id($con);

$sqli="insert into tbl_metereg(login_id,name,email,phone,username,password,confirmpass) values ('$n','$metername','$email','$phone','$username','$password','$confirmpass')";
 
if(mysqli_query($con,$sqli))
    {
    
    echo "successfully inserted";
    header('location:login.html');
   }
    
    }

mysqli_close($con);

?>


