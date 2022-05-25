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
    
  .styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 0.9em;
      font-family: 'Poppins', sans-serif;;
      width:50%;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  }
  .styled-table thead tr {
      background-color: #0d3073;
      color: #ffffff;
      text-align: center;
  }
  
  .styled-table th,
  .styled-table td {
      padding: 8px 20px;
  }
  
  
  .search-container{
  height:50px;
  use float:right;
  text-align: right;
  }
    </style> 
    
    
    
 
</head>
<body>






<?php
 $username =$_SESSION["Email"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_employreg  where Email='$username'");
 $row=mysqli_fetch_array($edit);
?>



<br><br><br><br>
<div class="container">
     <body>   
<BR>
         <h2>VIEW REPORTS</h2><BR>
        <div class="panel-heading"> </div>
        <div class="panel-body" >
        <div class="row">
              <form method="post" enctype="multipart/form-data">
              
            
            
             
   <div class="container">
  
  <table class="styled-table" border="2" style="margin-left:30px;">
       
                <thead class="thead-dark">
                
                    <tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Section</th>

                  <th>Report</th>
                  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;Mail</th>
                 
                    
                    
                    </tr>
                    </thead>
                    
                    <tbody>
                          <?php  
                             include("Database/connection.php");
                             $d=$row['Section'];
     
                         
                          $result = mysqli_query($con,"SELECT `re_id`, `name`, `section`, `email`, `date`, `report` FROM tbl_report where section='$d'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr style="background-color:white;">  
                          <td><?php echo $row["name"]; ?></td>
                               <td><?php echo $row["date"]; ?></td> 
                               <td><?php echo $row["section"]; ?></td>  
                               
                               <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="pdf/<?php echo $row["report"];?> "><i class='fa fa-file-pdf-o' style='font-size:17px'></i></a></button></td>
                               <td style="text-align:center;">
                    <input type="submit" style="background:white;color:black;padding:4px 10px" value='<?php echo $row["email"];?>' name="compose">
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
  $message= "Dear Overseer, I verified the details which you submited last day";
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