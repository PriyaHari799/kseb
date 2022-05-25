
<?php
include("includes/overheader.php");
include("Database/connection.php");



?>

<html>
    <head>

        <style>
body{

background-color:#ADD8E6;

}

</style>
</head>
<body>



<br>
<div class="container">
     <body>   
<BR><BR><BR>
         <h3>VIEW REPORTS</h3><br>
         <H6><i>You should download the report by click on view button and upload it.</i></H6><br>
        <div class="panel-heading"> </div>
        <div class="panel-body" >
        <div class="row">
              <form method="post" enctype="multipart/form-data">
              
            
            
                
                <table class="table table-striped table-light">
                <thead class="thead-dark bordered" >
                    <tr>
                  <th>Date</th>
                    <th>View Report</th>
                    <th>Upload Report</th>
                    <th>Status</th>
                    
                    
                    
                    </tr>
                    </thead>
                    <tbody>
                          <?php  
                          $username =$_SESSION["Email"];
                          $result = mysqli_query($con,"SELECT * FROM tbl_report WHERE email='$username'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr>  
                          <td><?php echo $row["date"]; ?></td>
                              
                               <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="view_overseer_reports.php?del=<?php echo $row["re_id"];?> " style="color:white;">View</a></button></td>
                               <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="upload_record.php?del=<?php echo $row["re_id"];?> " style="color:white;">Upload Record</a></button></td>
                               <td><?php echo $row["status"]; ?></td>
                              
                               
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


    
  


 
</body>
</center>                    
</html>


