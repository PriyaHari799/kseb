
<?php
include("includes/uheader.php");
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


$username=$_SESSION["username"];
 $edit=mysqli_query($con, "SELECT bill_id, `c_name`,`c_unit`, SUM(pay_amount) FROM tbl_billdetails  where c_name='$username' and status='Pending'");
 $row=mysqli_fetch_array($edit);

?>




<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-align-left"></i>
                        
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="color:Red;">HELLO,  <?php
			echo $_SESSION["username"];
		  ?></span>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                        <a href="userhome.php"><button type="button" class="btn btn-primary btn-arrow-left"><i class='fas fa-angle-double-left'></i>BACK TO HOME</button></a>
                            </li>&nbsp;&nbsp;

                            <li class="nav-item">
                            <a href="logout.php"><button class="btn btn-primary"><B>LOGOUT</B><i class='fas fa-angle-double-right'></i></button></a>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </nav>

<style>

.popup {
  width: 40%;
  padding: 15px;
  left: 0;
  margin-left: 33.333333%;
  border: 1px solid #ccc;
  border-radius: 10px;
  background: white;
  position: absolute;
 
  box-shadow: 5px 5px 5px #000;
  z-index: 10001;
}

p{

color:black;

}


</style>
</head>



<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<br><br><br><br><br>
<body>

<div class="popup">
  <p>Are you Confirm the Payment?.</p>
  <div class="text-right">
   
    <button class="btn btn-primary"><a href="bill_update.php?del=<?php echo $row["bill_id"];?> ">Yes</a></button>
    <button class="btn btn-cancel"><a href="quick_pay.php">Cancel</a></button>
  </div>
</div>

    </body>



<?php
      }
?>