<?php
include("includes/sub_header.php");
include("Database/connection.php");
?>






<html>
    <head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="stylesheet/style1.css">
    <style>

body {
  background-image: url("images/shome.jpg");
  background-color:#cce0ff;
}
    </style>
 
</head>
<body>










<br><br><br><br>
<div class="container">
     <body>   
<BR>
         <h2>VIEW REPORTS</h2><BR>
        <div class="panel-heading"> </div>
        <div class="panel-body" >
        <div class="row">
              <form method="post" enctype="multipart/form-data">
              
            
            
                
                <table class="table table-bordered table-light">
       
                <thead class="thead-dark">
                
                    <tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th>View</th>
                  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;Mail</th>
                 
                    
                    
                    </tr>
                    </thead>
                    
                    <tbody>
                          <?php  
                          
                        include("Database/connection.php");
                          $Email =$_SESSION["Email"];
                          $result = mysqli_query($con,"SELECT * FROM tbl_metervisit ");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr style="background-color:white;">  
                          <td><?php echo $row["Name"]; ?></td>
                               <td><?php echo $row["date"]; ?></td>  
                               
                               <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="download_report.php?del=<?php echo $row["v_id"];?> "><i class='fa fa-file' style='font-size:17px'></i></a></button></td>
                               <td style="text-align:center;">
                    <input type="submit" style="background:white;color:black;padding:4px 10px" value='<?php echo $row["Email"];?>' name="compose">
                    </td>
                             
                               
                          </tr>  
                          <?php  
                          }  
                          ?>  
                         </tbody>
                     </table>
                     
                     </form>
                        
                         
                </div>  

 
        </div>
        </div>
      
    </div>

    <?php
if(isset($_POST["compose"]))
{

  $id = $_POST["compose"];
  $subject="Report Verification"; 
  $message= "Dear Meter Reader, I verified the details which you submit last day.";
  $login_details="you doing well.";
  echo ("<script LANGUAGE='JavaScript'>
  window.open('https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=$id&Subject=$subject&body=$message,$login_details', '_blank');
  </script>");

 
}
?>
    
  


 
</body>
</center>                    
</html>

<script>
$(document).ready(function(){
    $(".view-btn").click(function(){
        $(this).text($(this).text() == 'Verify' ? 'verified' : 'verified');
    });
});
</script>