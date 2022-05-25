
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

<?php


if (isset($_POST["submit"]))
{
$u=$_POST["Type"];
	
		$cont="INSERT INTO `tbl_type` (`Type`) VALUES('$u')";
				$res=mysqli_query($con,$cont);
				header('location:add_category.php');
       
}
?>

<head>
<link rel='stylesheet' href='stylesheet/empreg1.css' type='text/css' />
<style>

.container1{
      max-width: 700px;
      width: 30%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }

    .container1 .title{
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }

    </style>
</head>
<br><br><br><br><br><br><br>

<body>



<center>

<div class="container">
    <div class="title">Add Category</div><br>
   
        
      <form method="post" action="#" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
        <div class="input-box">
            
            <input type="text" name="Type" id="Type" placeholder="Enter Employee Category">
</div>

<div class="button1">
            <input type="submit" value="Register" name="submit" style="width:100px; height:35px; background-color:#0A2558; color:white;">
            
          </div>

</div>
</form>




</div>

<br><br>
<div class="container1">
    <div class="title"><h5>Available Categories</h5></div><br>
   
        
    <table border="2">
                <thead class="thead-dark bordered" >
                    <tr>
                  <th>Type</th>
                    
                    
                    
                    
                    </tr>
                    </thead>
                    <tbody>
                          <?php  
                         
                          $result = mysqli_query($con,"SELECT Type FROM tbl_type");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr>  
                          <td><?php echo $row["Type"]; ?></td>
                              
                        
                              
                               
                          </tr>  
                          <?php  
                          }  
                          ?>  
                         </tbody>
                     </table>
                     




</div>
</center>
</body>













<script type="application/javascript">
  function validatecstreg()
  {
  
      var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
      var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
      var numericExpression = /^\d{10}$/; //Variable to validate only numbers
      var numericExp = /^\d{13}$/; //Variable to validate only numbers
      
      if(document.frmcstreg.Type.value == "")
    {
      alert("Kindly enter the category.");
      document.frmcstreg.Type.focus();
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
		
	