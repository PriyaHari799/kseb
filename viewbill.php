
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






<html>
    <head>

    <link rel="stylesheet" href="stylesheet/style1.css">
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









<br>
<div class="container">
     <body>   

         <h2>BILL HISTORY</h2>
        <div class="panel-heading"> </div>
        <div class="panel-body" >
        <div class="row">
              <form method="post" enctype="multipart/form-data">
              
            
            
                
                <table class="table table-striped table-light">
                <thead class="thead-dark">
                    <tr>
                
                    <th>Date</th>
                    <th>Unit</th>
                    <th>Bill Amount</th>
                    <th>View Reciept</th>
                    
                    
                    </tr>
                    </thead>
                    <tbody>
                          <?php  
                          $username =$_SESSION["username"];
                          $result = mysqli_query($con,"SELECT * FROM tbl_billdetails WHERE c_name='$username' and status='Completed'");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr>  
                          <td><?php echo $row["date"]; ?></td>  
                               <td><?php echo $row["c_unit"]; ?></td>  
                               <td><?php echo $row['pay_amount']; ?></td> 
                               <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="reciept.php?del=<?php echo $row["bill_id"];?> "><i class='fas fa-book-open'></i></a></button></td>
                               
                              
                               
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
<?php
      }
?>