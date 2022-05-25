<?php
include("includes/sub_header.php");
include("Database/connection.php");


?>

<html>

<head>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <style>

.container{
      max-width: 900px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }
    .container .title{
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }
    .container .title::before{
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #201753, #181755);
    }
.styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 0.9em;
      font-family: 'Poppins', sans-serif;;
      width:100%;

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
      text-align:center;
  }
  
  
  .search-container{
  height:50px;
  use float:right;
  text-align: right;
  }
    


    </style>

</head>
<br><br><br><br><br>
<div class="container">
  <h4>Leave Histroy</h4>
  <table class="styled-table" border="2" style="margin-left:8px;">
                <thead class="thead-dark">
                    <tr>
                  
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Description</th>
                    <th>Total Leaves</th>
                    <th>Status</th>
                    
                    </tr>
                </thead>
                    <tbody>
                          <?php  
                
                            $username =$_SESSION["Email"];
                          $result = mysqli_query($con,"SELECT `leave_type`, `from_date`, `to_date`, `description`,`total_leave`, `status` FROM `tbl_leave` where Email='$username'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr style="background-color: white">
                               
                               <td><?php echo $row["leave_type"]; ?></td>  
                               <td><?php echo $row["from_date"]; ?></td> 
                               <td><?php echo $row["to_date"]; ?></td> 
                               <td><?php echo $row["description"]; ?></td> 
                               <td><?php echo $row["total_leave"]; ?></td> 
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


