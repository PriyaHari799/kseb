
<?php
include("includes/admin_header.php");
include("Database/connection.php");
if(isset($_SESSION["id"])!=session_id())
{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='login.php';
      	</script>");
  	}
	else
  	{
?>

<?php


if (isset($_POST["submit"]))
{
$u=$_POST["names"];
	$e=$_POST["description"];
	
		$cont="INSERT INTO `tbl_notifications` (`notifications_name`, `message`, `date`,`status`) VALUES('$u','$e',curdate(),'0')";
				$res=mysqli_query($con,$cont);
				header('location:view_posts.php');
       
}

?>




<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel='stylesheet' href='stylesheet/empreg1.css' type='text/css' /><STYLE>

.button1{

width:50%;
height:100%



}
.purple-border textarea {
    border: 1px solid #201753;
}
.purple-border .form-control:focus {
    border: 1px solid #201753;
    box-shadow: #201753;
}

.green-border-focus .form-control:focus {
    border: 1px solid #201753;
    box-shadow: #201753;
}

</STYLE>
</head>




<br><br><br><br><br><br><br><br>
<div class="container">
                     <h3>Notification System</h3><br>
                     <div class="card">
  <div class="card-body" style="color:red;">

  View Generated Posts: <a href="view_posts.php" >View Here</a>
</div>
</div><br>
                     <form method="post" action="" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Notification Name</span>
            <input type="text" placeholder="Enter name" name="names" id="names" style="width: 640px;">
          </div>

          <div class="form-group purple-border">
            <span class="details">Message</span>
            <textarea class="form-control" rows="2" id="comment" name="description" placeholder=""></textarea>
          </div>

          <!-- <div class="input-box">
            <span class="details">Enter Your Complaint</span>
            <textarea class="form-control" rows="2" id="comment" name="description" placeholder="Complaint"></textarea>
          </div> -->
   
          <div class="button">
            <input type="submit" value="POST" name="submit">
            
          </div>
</div>
                     </form>       
              </div>
    

              <?php
}
?>