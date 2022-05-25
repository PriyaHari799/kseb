

<?php

include("includes/overheader.php");
include("Database/connection.php");
if(isset($_SESSION["id"])!=session_id())
{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='emplogin.php';
      	</script>");
  	}
	else
  	{
?>




<?php


include("Database/connection.php");
                if(extract($_POST))
                {
					
               
                  
                    $username = $_REQUEST['Name'];
                    $date = $_REQUEST['date'];
					$Email = $_REQUEST['Email'];
				   $Section=$_REQUEST['Section'];
           $phone=$_REQUEST['Phone'];
           $num_visit=$_REQUEST['num_visit'];
            
					
                    $log = array($Email, $date);
					foreach ($log as $field)
                    $flag=0;
					if($log=="")
					{
						$flag=1;
						echo "The fields are required";
					}
					  else
                    {
                      
                        $sql = "SELECT Email,`date` from tbl_overvisit where Email='{$Email}' and  `date`='{$date}'";
                                
        $results=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($results);
	
        $em=$row['Email'];
	$pas=$row['date'];

	if(($em==$Email)&&($pas==$date))
	{
    	echo ("<script LANGUAGE='JavaScript'>
        window.alert('Already submit report on this date');
        window.location.href='over_report.php';
      </script>");
	}
	      else
		  {
			  $amt="INSERT INTO `tbl_overvisit`(`Name`, `Email`, `date`, `Phone`, `Section`, `num_visit`) VALUE('$username','$Email','$date','$phone','$Section','$num_visit')";
				$res=mysqli_query($con,$amt);
					if($res)
	{
			header('location:oversuccess.php');
           
	}
		  }
					}
				}
 
?>










<html>

  <head>
  <link rel='stylesheet' href='stylesheet/empreg.css' type='text/css' />
  <style>
body{

background-color:#ADD8E6;

}


</style>



<?php

$use=$_SESSION["Email"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_employreg  where Email='$use'");
 $row=mysqli_fetch_array($edit);

?>

<body>
<BR><br><br>
<div class="container">
    <div class="title">GENERATE REPORT</div>
    <div class="content">
        
      <form method="post" action="#" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">

        <div class="input-box">
            <span class="details">Name:</span>
            <input type="text" name="Name" value="<?php echo $row['Name']?>" placeholder="Enter Consumer Number" readonly>
          </div>


          <div class="input-box">
            <span class="details">Email:</span>
            <input type="text" name="Email" value="<?php echo $row['Email']?>" placeholder="Enter Consumer Number" readonly>
          </div>

          <div class="input-box">
            <span class="details">Mobile Number:</span>
            <input type="text" name="Phone" value="<?php echo $row['phone']?>" placeholder="" readonly>
          </div>

          
          
          <div class="input-box">
            <span class="details">Reading Section:</span>
            <input type="text" name="Section" value="<?php echo $row['Section']?>" placeholder="" readonly>
          </div>
          
          <div class="input-box">
          <span class="details">Date:</span>
            <input type="date" name="date"  value="" id="demo" placeholder="date">
          </div>
          
         

          <div class="input-box">
            <span class="details">Number of Visits:</span>
            <input type="number" name="num_visit" value="" placeholder="No.of Visits">
          </div>
        

        </div>
     
        <div class="button">
            <input type="submit" value="SUBMIT" name="submit">
          </div>
          </form>
     
    </div>
  </div>
</body>



</html>
  






<script type="application/javascript">
  function validatecstreg()
  {
  
      var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
      var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
      var numericExpression = /^\d{10}$/; //Variable to validate only numbers
      var numericExp = /^\d{13}$/; //Variable to validate only numbers
      

  
  if(document.frmcstreg.consumer.value == "")
    {
      alert("Kindly enter consumer Number.");
      document.frmcstreg.consumer.focus();
      return false;
    }	
  
   
    
    else if(document.frmcstreg.unit.value == "")
    {
      alert("Kindly enter the unit.");
      document.frmcstreg.unit.focus();
      return false
      ;
    }	
    
    else if(document.frmcstreg.bill.value == "")
    {
      alert("Kindly enter the bill amount.");
      document.frmcstreg.bill.focus();
      return false;
    }	

  

    else if(document.frmcstreg.date.value == "")
    {
      alert("Kindly enter the date.");
      document.frmcstreg.date.focus();
      return false;
    }	

  
    else if(document.frmcstreg.username.value == "")
    {
      alert("Username should not be empty..");
      document.frmcstreg.username.focus();
      return false;
    }
      else if(!document.frmcstreg.username.value.match(alphaspaceExp))
    {
      alert("Only allow alphabets.");
      document.frmcstreg.username.focus();
      return false;
    }	
  
    
    else if(document.frmcstreg.bnumber.value == "")
    {
      alert("Building should not be empty..");
      document.frmcstreg.bnumber.focus();
      return false;
    } 
      
    
    
     
    else
    {
      return true;
    }

  }
  
  </script> 

<?php
    }
    ?>