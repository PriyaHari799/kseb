
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




<head>

<style>

 
    </style>
</head>

<body>

<br><br><br><br><br><br>
<div class="row">
  <div class="col-sm-6">
    <div class="card text-dark bg-light">
      <div class="card-body">
        <h5 class="card-title"><img src="images/cal.png" width="8%" height="8%"/>Bill Calculator</h5>
        <p class="card-text">Hello Employee, </p>
        <p class="card-text">You should enter a valid unit and consumer number while calculating the Bill Amount.Enter the reading to the corresponding 'Enter bill reading' menu on the header.</p>
        <a href="billcal.php" class="btn btn-danger">Bill Calculator</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-dark bg-light">
      <div class="card-body">
        <h5 class="card-title"><img src="images/3.png" width="8%" height="8%"/>Enter Bill Reading</h5>
        <p class="card-text">Hello Employee,</p>
        <p class="card-text">You should enter a accurate bill amount while entering the Bill Reading which calculate from the bill calculator.Verify the amount before submit the bill.</p>
        <a href="billen.php" class="btn btn-danger">Enter Reading</a>
      </div>
    </div>
  </div>
</div>
 
</body>
    
	<?php
    }
  ?>
    

    

