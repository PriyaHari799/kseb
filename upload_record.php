


<?php
include("includes/overheader.php");
include("Database/connection.php");



if (isset($_POST["submit"]))
{

    $ow=$_FILES['record']['name'];
    $ow_type=$_FILES['record']['type'];
    $ow_size=$_FILES['record']['size'];
    $ow_tem_loc=$_FILES['record']['tmp_name'];
   $ow_store="pdf/".$ow;
   move_uploaded_file($ow_tem_loc,$ow_store); 



   $id=$_GET["del"];

	$email=$_SESSION['Email'];
		$cont="UPDATE tbl_report SET report ='$ow', `status`='Uploaded' WHERE re_id = '$id'";
				$res=mysqli_query($con,$cont);
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully Uploaded');
                window.location.href='view_report.php';
                </script>");
       
}
?>

<head>
<link rel='stylesheet' href='stylesheet/empreg1.css' type='text/css' />
<style>
body{

background-color:#ADD8E6;

}

   
    </style>
</head>
<br><br><br><br><br><br><br>

<body>




<div class="container">
   
 <div class="title">UPLOAD REPORT HERE</div><br>
   
        
      <form method="post" action="#" name="frmcstreg" onSubmit="return validatecstreg()" enctype="multipart/form-data">
        <div class="user-details">
        <div class="input-box">
            
            <input type="file" name="record" id="Type" style="width: 500px;" placeholder="upload">
</div>
<br>
<div class="button1">
            <input type="submit" value="Submit" name="submit" style="width:100px; height:35px; background-color:#0A2558; color:white;"><br><br>
            <button type="button"  class="btn btn-primary" style="margin-left:90%;"><a href="view_report.php" style="color:white;">Back</a></button>

          </div>
</div>
</form>
</center>
</body>













<script type="application/javascript">
  function validatecstreg()
  {
  
      var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
      var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
      var numericExpression = /^\d{10}$/; //Variable to validate only numbers
      var numericExp = /^\d{13}$/; //Variable to validate only numbers
      
      if(document.frmcstreg.Type.value == "")
    {
      alert("Kindly enter the category.");
      document.frmcstreg.Type.focus();
      return false;
    }	


  
   
    
 
     
    else
    {
      return true;
    }

  }
  
  </script> 






