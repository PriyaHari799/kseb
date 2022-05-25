



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

$username =$_SESSION["Email"];
$edit=mysqli_query($con, "SELECT `Name`,`Section`,`Email`  FROM tbl_employreg  where Email='$username'");
$row=mysqli_fetch_array($edit);


?>





<html>
    <head>
    <link rel='stylesheet' href='stylesheet/apply_leave.css' type='text/css' />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <style>

body{

background-color:#ffcccc;


}



.form-control{
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #0b1146;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }



    </style>
</head>
<body>


            

</head>
<body>
<br><br> <br>

<div class="card" style="width: 17rem; text-align:right;">
  <div class="card-body">
    <h5 class="card-title">Total leaves taken:
    <?php 

include("Database/connection.php");
$username=$_SESSION["Email"];
$result=mysqli_query($con,"SELECT SUM(DATEDIFF(to_date, from_date)+1) as total from tbl_leave where Email='$username'");
if($data=mysqli_fetch_assoc($result)){
echo $data['total'];
}else
 echo "0"; 
?>


    </h5>
    
    
    <a href="view_over_leave.php">View Leave History</a>

  </div>
</div>

<div class="container">
<div class="row">

<div class="col">

    <div class="title"><h4>Apply Leave</h4></div><br>

    <div class="card">
  <div class="card-body" style="color:red;">
   You have only 20 casual leaves in an year .  You already takes  <?php 

        include("Database/connection.php");
        $username=$_SESSION["Email"];
        $result=mysqli_query($con,"SELECT SUM(DATEDIFF(to_date, from_date)+1) as total from tbl_leave where Email='$username'");
        if($data=mysqli_fetch_assoc($result)){
        echo $data['total'];
        }else
        echo "0"; 
        ?>
&nbsp;leaves.
  </div>
</div>

      <div class="content">
        
      <form method="post" action="apply_leave_over.php" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
        

          
            <div class="input-box">
                <span class="details">Leave Type</span>
                
                <select class="form-control" id="leave_type" name="leave_type" id="exampleFormControlSelect1">
                <option value="">Choose leave type</option>
                <option value="Casual Leave">Casual Leave</option>
                <option value="Medical Leave">Medical Leave</option>
                
          
            </select>
              </div>


              <div class="input-box">
                <span class="details">From Date</span>
                <input type="date" name="from" placeholder="Enter Consumer Number" id="date_picker">
              </div>

              
              <div class="input-box">
                <span class="details">To Date</span>
                <input type="date" name="to"  placeholder="Enter Consumer Number" id="date_pickers">
              </div>
              
            
              <div class="input-box">
                <span class="details">Description</span>
                <textarea class="form-control" rows="2" id="comment" name="description" placeholder="Enter any descriptions"></textarea>
              </div>


          


              <div class="input-box">
                <input type="text" name="username" value="<?php echo $row['Name']?>" placeholder="Enter Consumer Number" hidden>
              </div>

              

              <div class="input-box">
                <input type="text" name="section" value="<?php echo $row['Section']?>" placeholder="Enter Consumer Number" hidden  >
              </div>
              
              

              <div class="input-box">
                <input type="text" name="email" value="<?php echo $row['Email']?>" placeholder="Enter Consumer Number" hidden >
              </div>  
            

        
        </div>
        
        <div class="button">
            <input type="submit" value="Apply" name="submit">
            
          </div>
          
    </form>

  </div>
  </div>



  

    </div>
    
  


  <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
    </script>

    
  <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_pickers').attr('min',today);
    </script>




</body>

</html>
<script>




  </script>
 





<script type="application/javascript">
  function validatecstreg()
  {
  
      var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
      var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
      var numericExpression = /^\d{10}$/; //Variable to validate only numbers
      var numericExp = /^\d{13}$/; //Variable to validate only numbers
      
      if(document.frmcstreg.leave_type.value == "")
    {
      alert("Kindly enter the leave type.");
      document.frmcstreg.leave_type.focus();
      return false;
    }	


    else if(document.frmcstreg.from.value == "")
    {
      alert("Kindly enter the From Date.");
      document.frmcstreg.from.focus();
      return false;
    }	
  

    if(document.frmcstreg.to.value == "")
    {
      alert("Kindly enter the To Date.");
      document.frmcstreg.to.focus();
      return false;
    }	
    
    if(document.frmcstreg.description.value == "")
    {
      alert("Kindly enter the description about your leave.");
      document.frmcstreg.description.focus();
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
