

<?php

include("includes/emp_header.php");
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








<html>

  <head>
  <link rel='stylesheet' href='stylesheet/apply_leave.css' type='text/css' />
  <style>


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
     
  
   <br>
  
 
<body><br>   <br>   <br>   <br>
    <div class="container">
     
        <div class="title">GENERATE ELECTRICITY BILL</div><BR>
        <div class="content">
        <div id="page-wrap">
            
    
        <form method="post" action="billenter.php" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Consumer Name:</span>
            <select class="form-control" name="names" id="names">
                        <span class="fa fa-user"></span>
                        <option value="" >Select Consumer Name</option>
                            <?php 
                          include("Database/connection.php"); 
                           
                           $records = mysqli_query($con, "SELECT * From tbl_usereg");  
                   
                           while($row = mysqli_fetch_array($records))
                           {
                               echo "<option value='". $row['reg_id'] ."'>" .$row['name'] ."</option>";  
                           }	
                            ?>
                        </select>
          </div>

          <div class="input-box">
            <span class="details">Consumer Number:</span>
            <select class="form-control" name="consnumber" id="consnumber">
                        <span class="fa fa-user"></span>
                        </select>

          </div>


          <div class="input-box">
            <span class="details">Unit:</span>
            <input type="number" placeholder="Enter Unit" name="unit" id="unit">
          </div>
          
          
           
          
          <div class="input-box">
            <span class="details">Due Date:</span>
            <input type="date" placeholder="Enter Amount" name="duedate" id="duedate">
          </div>
          
          
          
          <div class="input-box">
            <span class="details">Disconnection Date:</span>
            <input type="date" placeholder="" name="disdate" id="disdate">
          </div>
          

        
          
          <div class="input-box">
            <span class="details">Total Amount:</span>
            <input type="number" placeholder="Enter Total Amount" name="payamount" id="amount">
          </div>
  
         
          <div class="input-box">
            
            <input type="text" placeholder="" name="gendate" id="gendate" hidden>
          </div>
          
          
        </div>
        
        <div class="button">
            <input type="submit" value="Enter" name="submit">

          </div>

          
      </form>
    
            
        </div>
       
        </div>
      </div>
    
    
    
        
    </body>
    </html>
 



    <script type="application/javascript">
  function validatecstreg()
  {
  
      var alphaExp = /^[a-zA-Z]+$/; 
      var alphaspaceExp = /^[a-zA-Z\s]+$/; 
      var numericExpression = /^\d{16}$/;
      var numericExpression1 = /^\d{3}$/; 
      var numericExp = /^\d{13}$/; 
      
      if(document.frmcstreg.names.value == "")
    {
      alert("Enter the Consumer Name.");
      document.frmcstreg.names.focus();
      return false;
    }	


    else if(document.frmcstreg.consnumber.value == "")
    {
      alert("Enter the Consumer Number.");
      document.frmcstreg.consnumber.focus();
      return false;
    }	
  
    if(document.frmcstreg.unit.value == "")
    {
      alert("Enter the unit.");
      document.frmcstreg.unit.focus();
      return false;
    }
    if(document.frmcstreg.duedate.value == "")
    {
      alert("Enter the duedate.");
      document.frmcstreg.duedate.focus();
      return false;
    }	
    
    if(document.frmcstreg.disdate.value == "")
    {
      alert("Enter the disconnection date.");
      document.frmcstreg.disdate.focus();
      return false;
    }	
     
    if(document.frmcstreg.payamount.value == "")
    {
      alert("Enter the Total amount.");
      document.frmcstreg.payamount.focus();
      return false;
    }	
 
     
    else
    {
      return true;
    }

  }
  
  </script> 


<script>
function GetTodaysdate()
{ 
    var today = new Date();
   
    var mm = today.getMonth() + 1; //January is 0!

    
    if (mm < 10) {
      mm = '0' + mm;
    } 
    
    return  mm;
}

document.getElementById("gendate").value=  GetTodaysdate();
</script>
<script type="text/javascript">
  $(document).ready(function(){  
	$("#names").change(function() {   
    var eid = $(this).find(":selected").val();
    $.ajax({
        method:"POST",
        url: "server.php",
        data:{
            id: eid
        },
        success: function(data){
          $("#consnumber").html(data);

    }});
  })
});
</script>
<script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">

<?php
    }
    ?>