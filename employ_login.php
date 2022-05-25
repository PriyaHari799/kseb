  
  <?php
session_start();
include("Database/connection.php");
$email=$_POST["Email"];
$password=$_POST["password"];


$sql="select * from `tbl_employreg` where `Email`='$email' and `password`='$password' ";
$result=mysqli_query($con,$sql);
$n=mysqli_num_rows($result);
if($n>0)
{
	while($row=mysqli_fetch_array($result))
	{
	



		

		if ($row['status']!=2) 
		{
			echo "sorry please wait for admin approval";
		}
		else
		{
			$_SESSION['Type_Id']=$row['Type_Id'];
			if($row['Type_Id']=='1' )
			{	
                $_SESSION['id']=$row['emp_id'];
				$_SESSION['Email']=$email;
				header("location:meterhome.php");

			}
			elseif($row['Type_Id']=='2')
			{	
                $_SESSION['id']=$row['emp_id'];
				$_SESSION['Email']=$email;
				header("location:overhome.php");

			}
			elseif($row['Type_Id']=='3')
			{	
                $_SESSION['id']=$row['emp_id'];
				$_SESSION['Email']=$email;
				header("location:sub_home.php");

			}
			elseif($row['Type_Id']=='4')
			{	
                $_SESSION['id']=$row['emp_id'];
				$_SESSION['Email']=$email;
				header("location:aee_home.php");

			}
			
			else
			{
				
				header("location:emplogin.html");
			}


		}
}


}
else
{



echo ("<script LANGUAGE='JavaScript'>
window.alert('Login Failed. Incorrect credentials');
window.location.href='emplogin.php';
</script>");
}
mysqli_close($con);
?>
