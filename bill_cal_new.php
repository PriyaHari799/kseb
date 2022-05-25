
<?php
include("includes/emp_header.php");
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


<!DOCTYPE html>

<head>
	<title>PHP - Calculate Electricity Bill</title>
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
<style>

body{

  background-color:#ffcccc;


}


.card {
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
}

.blue-text {
    color: #00BCD4
}

.form-control-label {
    margin-bottom: 0
}

input,
textarea,
button {
    padding: 8px 15px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}

.btn-block {
    text-transform: uppercase;
    font-size: 15px !important;
    font-weight: 400;
    height: 43px;
    cursor: pointer
}

.btn-block:hover {
    color: #fff !important
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
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
	   
	   header ("Location: meter_calresult.php");
  }
  }
?>



<body>



<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            
            <div class="card">
               <h3>Generate Bill</h3><br>
                <form class="form-card" onsubmit="event.preventDefault()">
                    <div class="row justify-content-between text-left">
                        
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tarrif Check<span class="text-danger"> *</span></label>
                        <select  name="tarrif" class="form-control" id="exampleFormControlSelect2">
        <option value="domestic">Domestic</option>
        <option value="commerical">Commerical</option>
		<option value="public">Public Lights</option>
		<option value="ltcommerical">Lt Commerical</option>
		<option value="workshop">Public Workshop</option>
		<option value="industries">Tiny Industries</option>
		<option value="power">Power Looms</option>
	
      </select>
                         </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Billing Cycle<span class="text-danger"> *</span></label> 
                        <select  name="month" class="form-control" id="exampleFormControlSelect2">
        <option value="bimonthly">Bi-Monthly</option>
        <option value="monthly">Monthly</option>
        
      </select> </div>
                    </div>



                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Consumed Units<span class="text-danger"> *</span></label>
                        <input type="text"  name="units" class="form-control" id="exampleFormControlInput1"required> </div>

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Net Amount<span class="text-danger"> *</span></label>
                         <input type="text" id="mob" name="mob" placeholder="" onblur="validate(4)"> </div>
                    </div>

                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Business email<span class="text-danger"> *</span></label> <input type="text" id="email" name="email" placeholder="" onblur="validate(3)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone number<span class="text-danger"> *</span></label> <input type="text" id="mob" name="mob" placeholder="" onblur="validate(4)"> </div>
                    </div>
                   
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Request a demo</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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