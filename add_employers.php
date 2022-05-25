
<?php
include("includes/admin_header.php");
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


<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel='stylesheet' href='stylesheet/empreg1.css' type='text/css' />
</head>
<br><br><br><br><br>


<body>
    
    <div class="container">
    
    <div class="title">Add Employees</div>
    <div class="content">
        
      <form method="post" action="add employ.php" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter name" name="names" id="names">
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <textarea name = "Address" class = "form-control" placeholder = "Address"></textarea>
          </div>

          
          

          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter email" name="umail" id="umail">
          </div>
          
          <div class="input-box">
            <span class="details">Section</span>
            <input type="text" placeholder="Enter Section" name="section" id="section">
          </div>

          <div class="input-box">
            <span class="details">User Type</span>
            <select class="form-control" name="staff_type" id="staff_type" required="required">
                        <span class="fa fa-user"></span>
                            <option>--Select User Type--</option>
                            <?php 
                          include("Database/connection.php"); 
                           
                           $records = mysqli_query($con, "SELECT * From tbl_type");  
                   
                           while($row = mysqli_fetch_array($records))
                           {
                               echo "<option value='". $row['Type_Id'] ."'>" .$row['Type'] ."</option>";  
                           }	
                            ?>
                        </select>
          </div>
          
          


          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter Password" name="password" id="password">
          </div>

          
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" placeholder="Enter Phone number" name="phone" id="phone">
          </div>
          
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Enter Password" name="uconfirmpass" id="uconfirmpass">
          </div>
         
          
         


          
        </div>
        
        <div class="button">
            <input type="submit" value="ADD" name="register">
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
  
  var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID
  
    if(document.frmcstreg.names.value == "")
    {
      alert("Employee name should not be empty..");
      document.frmcstreg.names.focus();
      return false;
    }
    else if(!document.frmcstreg.names.value.match(alphaspaceExp))
    {
      alert("Please enter only letters for Customer name..");
      document.frmcstreg.names.focus();
      return false;
    }
    
    else if(document.frmcstreg.umail.value == "")
    {
      alert("Kindly enter Email ID..");
      document.frmcstreg.umail.focus();
      return false;
    }		
    else if(!document.frmcstreg.umail.value.match(emailExp))
    {
      alert("Kindly enter Valid Email ID.");
      document.frmcstreg.umail.focus();
      return false;
    }	
    
    else if(document.frmcstreg.staff_type.value == "")
    {
      alert("Select your employee type.");
      document.frmcstreg.staff_type.focus();
      return false;
    }
    
    else if(document.frmcstreg.phone.value == "")
    {
      alert("Kindly enter mobile Number.");
      document.frmcstreg.phone.focus();
      return false
      ;
    }	
    else if(!document.frmcstreg.phone.value.match(numericExpression))
    {
      alert("Kindly enter valid mobile number..");
      document.frmcstreg.phone.focus();
      return false;
    }
    else if(document.frmcstreg.Address.value == "")
    {
      alert("Address should not be empty..");
      document.frmcstreg.Address.focus();
      return false;
    }
    else if(document.frmcstreg.section.value == "")
    {
      alert("Section should not be empty..");
      document.frmcstreg.section.focus();
      return false;
    }
    
    
    else if(document.frmcstreg.password.value == "")
    {
      alert("Password should not be empty..");
      document.frmcstreg.password.focus();
      return false;
    }			
    else if(document.frmcstreg.password.value.length < 8)
    {
      alert("Password length should be more than 8 characters...");
      document.frmcstreg.password.focus();
      return false;
    }
    else if(document.frmcstreg.password.value.length > 16)
    {
      alert("Password length should be less than 16 characters...");
      document.frmcstreg.password.focus();
      return false;
    }		
    else if(document.frmcstreg.uconfirmpass.value == "")
    {
      alert("Confirm password should not be empty..");
      document.frmcstreg.uconfirmpass.focus();
      return false;
    }		
    else if(document.frmcstreg.password.value != document.frmcstreg.uconfirmpass.value)
    {
      alert("Password and confirm password not matching...");
      document.frmcstreg.uconfirmpass.focus();
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