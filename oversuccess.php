
<?php
include("includes/overheader.php");
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
	
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
<style>

body{

background-color:#ADD8E6;

}
h1 {
          color: #fffff;
          
          
        
          margin-bottom: 10px;
        }
        p {

         
          font-size:20px;
          margin: 0;
        }
      i {
        color:#0000cc;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }



</style>

<br><br><br>
<center>
            <body>
      <div class="card">
      <div style="border-radius:150px; height:150px; width:150px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h4>Report Generation Successful</h4> 
        <?php  
                          $username =$_SESSION["Email"];
                          $result = mysqli_query($con,"SELECT * FROM tbl_overvisit WHERE Email='$username'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                        


       <?php
                          }
       ?>
      </div>
    </body>
    </center>






<?php
      }
      ?>