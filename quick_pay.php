
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
    <link rel="stylesheet" href="stylesheet/style3.css">
   
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
      padding: 3px 20px;
  }
  
  
  .search-container{
  height:50px;
  use float:right;
  text-align: right;
  }

  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 2px 2px;
  cursor: pointer;

}
.button3 {border-radius: 8px;}
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


   <center><H2>PAY NOW</H2></center>

   <div class="container">
  
  <table class="styled-table" border="2" style="margin-left:30px;">
                  <thead class="thead-dark">
                      <tr style="font-size:14px;">
                   
                      <th>Unit</th>
                      <th>Due Date</th>
                      <th>Disconnection Date</th>
                      <th>Amount</th>
                      <th>Pay Now</th>
                      <th>Status</th>
                      
                      
                     
                      </tr>
                      </thead>
        <tbody>
  
          <?php
          include("Database/connection.php");
          $username=$_SESSION["username"];
          $sql = "SELECT * FROM tbl_billdetails where c_name='$username' and status='Pending'";
          $result = mysqli_query($con, $sql);
          $rows = mysqli_num_rows($result);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "
                <tr>
            
                <td scope='row'>" . $row['c_unit'] . "</th>
                <td scope='row'>" . $row['duedate'] . "</th>
                <td scope='row'>" . $row['discon_date'] . "</th>
                <td scope='row'>" . $row['pay_amount'] . "</th>
               
                
                <td>
                              
                <form action='checkout.php' method='POST'>
                
                 <center> <button class='button button3' id='myBtn' onclick='myFunction()'  value='" . $row['bill_id'] . "' name=rbtn>Pay Online</button></center>
                  
                </form>
  
                </td>
  
                <td scope='row'>" . $row['status'] . "</th>
               
                
  
  
               ";
              
              echo "</th>";
              
  
  
  
              //echo "<td scope='row'><a class='btn btn-light' name='mbtn' value='hai' href='adminuserdetail.php?id=" . $row['id'] . "'>Show</a></th>
             echo " </tr>";
            }
          }
          else{

              echo "No bill is pending";

          }
          ?>
  
        </tbody>
      </table>
  
    </div>
  
  
    </body>
  
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