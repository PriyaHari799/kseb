
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


<!DOCTYPE html>

<head>
	<title>PHP - Calculate Electricity Bill</title>
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
<style>



input[type=submit] {
  background-color:#000080;
  border: none;
  color: white;
  padding: 9px 8px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
  </style>
</head>
<body><br><br><br><br>
<?php
 
  if (isset($_POST['submit'])) { 
  
	print_r ($_POST);
  
  if(isset($_POST) & !empty($_POST)){

	   $_SESSION['tarrif'] = $_POST['tarrif'];
	   $_SESSION['month'] = $_POST['month'];
	   $_SESSION['load'] = $_POST['load'];
	   $_SESSION['units'] = $_POST['units'];
	   
	   header ("Location: meter_calresult.php");
  }
  }
?>

<body>
<BR><BR>
<div class="container">
    
    <div class="title">BILL CALCULATOR</div><BR>
    <div class="content">
    <div id="page-wrap">
		




    <form method = "post" action = "billcal.php">
    <div class="container">
  
  <div class="row">
    <div class="col-25">
       <label for="tarrif">Tarrif Check</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;
    <div class="col-75">
      <select  name="tarrif" class="form-control" style="width:580px;" id="exampleFormControlSelect2">
        <option value="domestic">Domestic</option>
        <option value="commerical">Commerical</option>
		<option value="public">Public Lights</option>
		<option value="ltcommerical">Lt Commerical</option>
		<option value="workshop">Public Workshop</option>
		<option value="industries">Tiny Industries</option>
		<option value="power">Power Looms</option>
	
      </select>
    </div>
  </div>
<br>

  <div class="row">
    <div class="col-25">
      <label for="month">Billing Cycle</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;
    <div class="col-75">
      <select  name="month" class="form-control" id="exampleFormControlSelect2" style="width:580px;">
        <option value="bimonthly">Bi-Monthly</option>
        <option value="monthly">Monthly</option>
        
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-25">
      <label for="units">Consumed Units</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col-75">
      <input type="text"  name="units" class="form-control" id="exampleFormControlInput1"required>
    </div>


    
  </div>
  <br>
  <div class="row">
     <input type = "submit" class="btn btn-danger" name = "submit" value = "Calculate">
  </div>



		</form>

	<div>
</body>
</html>
 
<script type="application/javascript">
    function validatecstreg()
    {
    
    
    var numericExp = ^[1-9]\d*$; //Variable to validate only numbers
    
    
    
      if(document.frmcst.units.value == "")
      {
        alert("Enter the unit.");
        document.frmcst.units.focus();
        return false;
      }
    
      else if(!document.frmcst.units.value.match(numericExp))
      {
        alert("Only allow Numbers..");
        document.frmcst.units.focus();
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