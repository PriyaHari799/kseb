
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

 <head>
    <link rel="stylesheet" href="stylesheet/checkout.css">
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


<div class="container">
    <!-- For demo purpose -->
    <div class="row mb-4">
      
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                <H4><center>CARD DETAILS</center></H4>
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Card </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i>  </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">



                            <form method="post" action="successful.php" name="frmcstreg" onSubmit="return validatecstreg()">
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name" class="form-control "> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="number" name="cardnumber" placeholder="Valid card number" class="form-control ">
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" placeholder="MM" name="exp1" class="form-control"> <input type="number" placeholder="YY" name="exp2" class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" name="cvv"  class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="card-footer"> 
                                    
                               
                                <button type="submit" name="submit" id="btn" class="subscribe btn btn-primary btn-block shadow-sm"  data-toggle="modal" data-target="#myModal">Confirm Payment</a></button>                            </form>

                            </form>
                        </div>
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>

</body>




<script type="application/javascript">
  function validatecstreg()
  {
  
      var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
      var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
      var numericExpression = /^\d{16}$/;
      var numericExpression1 = /^\d{3}$/; //Variable to validate only numbers
      var numericExp = /^\d{13}$/; //Variable to validate only numbers
      
      if(document.frmcstreg.username.value == "")
    {
      alert("Enter the Card Holder Name.");
      document.frmcstreg.username.focus();
      return false;
    }	


    else if(document.frmcstreg.cardnumber.value == "")
    {
      alert("Enter the Card Number.");
      document.frmcstreg.cardnumber.focus();
      return false;
    }	
  
   else if(!document.frmcstreg.cardnumber.value.match(numericExpression))
    {
      alert("Enter 16 digit card number.");
      document.frmcstreg.cardnumber.focus();
      return false;
    }	

    if(document.frmcstreg.exp1.value == "")
    {
      alert("Enter the expiry date of card.");
      document.frmcstreg.exp1.focus();
      return false;
    }
    if(document.frmcstreg.exp2.value == "")
    {
      alert("Enter the expiry date of card.");
      document.frmcstreg.exp2.focus();
      return false;
    }	
    
    if(document.frmcstreg.cvv.value == "")
    {
      alert("Enter the CVV number.");
      document.frmcstreg.cvv.focus();
      return false;
    }	
    
   else if(!document.frmcstreg.cvv.value.match(numericExpression1))
    {
      alert("Enter 3 digit cvv number.");
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