
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



<html>
    <head>
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
   
    <style>

body {
  background-image: url("images/shome.jpg");
  background-color:#cce0ff;
}
    </style>
</head>
<body>
<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-align-left"></i>
                        
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="color:Red;">HELLO, <?php
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


</head>
<body>
<!DOCTYPE html>

<head>
	<title>Calculate Electricity Bill</title>
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
<style>

body{

  background-color:#ffcccc;


}

input[type=submit] {
  background-color:red;
  border: none;
  color: white;
  padding: 9px 8px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}


  </style>
</head>

<?php
 
  if (isset($_POST['submit'])) { 
  
	print_r ($_POST);
  
  if(isset($_POST) & !empty($_POST)){

	   $_SESSION['tarrif'] = $_POST['tarrif'];
	   $_SESSION['month'] = $_POST['month'];
	   $_SESSION['load'] = $_POST['load'];
	   $_SESSION['units'] = $_POST['units'];
	   
	   header ("Location: BillResult.php");
  }
  }
?>

<body>
<BR><BR>
<div class="container">
    <center><img src="images/4.jpg" alt="" class="img-fluid" width="10%" height="10%"></center><BR>
    <div class="title">BILL CALCULATOR</div><BR>
    <div class="content">
    <div id="page-wrap">
		

		<form method = "post" action = "Billcalculator.php">
    


<div class="container">
  
  <div class="row">
    <div class="col-25">
       <label for="tarrif">Tarrif Check</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;
    <div class="col-75">
      <select  name="tarrif" class="form-control" style="width:450px;" id="exampleFormControlSelect2">
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
      <select  name="month" class="form-control" id="exampleFormControlSelect2" style="width:450px;">
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