
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
 $edit=mysqli_query($con, "SELECT * FROM tbl_billdetails  where c_name='$username'");
 $row=mysqli_fetch_array($edit);

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
<body>


<div class="container">
    <div class="title">Quick Pay</div>
    <div class="content">
        
      <form method="post" action="quickpay1.php" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">

        <div class="input-box">
            <span class="details">Your Name</span>
            <input type="text" name="username" value="<?php echo $row['c_name']?>" placeholder="Enter Consumer Number" readonly>
          </div>


          <div class="input-box">
            <span class="details">Your Consumer Number</span>
            <input type="text" name="consumer" value="<?php echo $row['c_number']?>" placeholder="Enter Consumer Number" readonly>
          </div>

          <div class="input-box">
            <span class="details">Unit Consumed</span>
            <input type="text" name="unit" value="<?php echo $row['c_unit']?>" placeholder="" readonly>
          </div>

          
          
          <div class="input-box">
            <span class="details">Due Amount</span>
            <input type="text" name="damount" value="<?php echo $row['due_amount']?>" placeholder="" readonly>
          </div>
          
          <div class="input-box">
            <span class="text-danger"><b>Enter Current Date</b></span>
            <input type="date" name="date"  value="" id="demo" placeholder="" required>
          </div>
          
          <div class="input-box">
            <span class="details">Total</span>
            <input type="number" name="tamount" value="<?php echo $row['pay_amount']?>" placeholder="" readonly>
          </div>
          
           
          <div class="input-box">
            <span class="details">Due Date</span>
            <input type="text" name="duedate"  value="<?php echo $row['duedate']?>" placeholder="" readonly>
          </div>

          <div class="input-box">
            <span class="details">Amount</span>
            <input type="number" name="amount" value="<?php echo $row['amount']?>" placeholder="Enter Building Number" readonly>
          </div>

          
        
          <div class="input-box">
            <span class="details">Disconnection Date</span>
            <input type="text" name="disdate"  value="<?php echo $row['discon_date']?>" placeholder="Enter Bill Amount" readonly>
          </div>
          
        

        </div>
     
        <div class="button">
            <input type="submit" value="Pay Now" name="submit">
          </div>
          </form>
     
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>



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
		
	