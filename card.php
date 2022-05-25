
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


</head>

<!DOCTYPE html>
<html>
<head>


</head>



<body>
    <br><br><br>
<form action="Payment.php" name="frmcstreg" onSubmit="return validatecstreg()">
<div class="row d-flex justify-content-center">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <strong>Enter Your Card Details</strong>
                   
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="ccnumber">Card Number</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" placeholder="000 000 000 000 0" autocomplete="email" name="card" maxlength="16" required>
                                    <div class="input-group-append">
                                        
                                            <i class="mdi mdi-credit-card"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ccmonth">Month</label>
                            <select class="form-control" id="ccmonth" name="month" required >
                            <option> </option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ccyear">Year</label>
                            <select class="form-control" id="ccyear" name="year" required>
                            <option> </option>
                                
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                                <option>2026</option>
                                <option>2027</option>
                                <option>2028</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cvv">CVV/CVC</label>
                                <input class="form-control" id="cvv" type="text" name="cvv" minlength="3" maxlength="3" placeholder="123" required >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-success float-right" type="submit" name="submit" id="submit">
                   
                        <i class="mdi mdi-gamepad-circle"></i> Continue</button>
                    <button class="btn btn-sm btn-danger" type="reset">
                        <i class="mdi mdi-lock-reset"></i> Reset</button>
                </div>
            </div>
        </div>

    </div>
</div>
</form>
</body>

</html>


<script type="application/javascript">
    function validatecstreg()
    {
    
    
        var numericExp = "^4[0-9]{12}(?:[0-9]{3})?$";
        var cvv="^([0-9]{3,4})$";
    
        
        if(document.frmcstreg.name.value == "")
      {
        alert("Enter the name.");
        document.frmcstreg.name.focus();
        return false;
      }
     else if(document.frmcstreg.card.value == "")
      {
        alert("Enter a 13 digit card number.");
        document.frmcstreg.card.focus();
        return false;
      }
    
      else if(!document.frmcstreg.card.value.match(numericExp))
      {
        alert("Enter a valid card Number");
        document.frmcstreg.card.focus();
        return false;
      }


      else if(document.frmcstreg.month.value == "")
      {
        alert("Enter the month.");
        document.frmcstreg.month.focus();
        return false;
      }
      else if(document.frmcstreg.year.value == "")
      {
        alert("Enter the Year.");
        document.frmcstreg.year.focus();
        return false;
      }
      else if(document.frmcstreg.cvv.value == "")
      {
        alert("Enter the cvv number.");
        document.frmcstreg.cvv.focus();
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


