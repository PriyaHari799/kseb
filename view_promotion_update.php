
<?php
include("includes/admin_header.php");
include("Database/connection.php");

?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
<br>
<div class="container">
     <body>   
<br><br><BR><BR>
         <h2>VIEW PROMOTION UPDATE REQUESTS</h2><BR>
        <div class="panel-heading"> </div>
        <div class="panel-body" >
        <div class="row">
              <form method="post" enctype="multipart/form-data">
              
            
            
                
                <table class="table table-striped table-light" border="2">
                <thead class="thead-dark">
                    <tr>
                    <th>Employee Name</th>
                    <th>Employee Position</th>
                    <th>Ownership</th>
                    <th>Section</th>
                    <th>Email</th>
                  
                    </tr>
                    </thead>
                    <tbody>
                          <?php  
                      
                          $result = mysqli_query($con,"SELECT `name`, `position`, `ownership`, `email`, `section` FROM tbl_promotion;");
                          while($row = mysqli_fetch_array($result)){?> 

                         
                          <tr>  
                          <td><?php echo $row["name"]; ?></td>
                               <td><?php echo $row["position"]; ?></td>  
                               <td><a href="pdf/<?php echo $row["ownership"]; ?>">Proof of Promotion</a></td>
                               <td><?php echo $row["section"]; ?></td>
                               <td><?php echo $row["email"]; ?></td> 
                               
                               
                               
                              
                               
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

  </html>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




