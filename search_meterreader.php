

<?php
include("includes/sub_header.php");
include("Database/connection.php");
if(isset($_SESSION["id"])!=session_id())
{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='emplogin.php';
      	</script>");
  	}
	else
  	{
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  
<style>


.search-container{
height:50px;
use float:right;
text-align: right;
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
    
  }
  
  .styled-table th,
  .styled-table td {
      padding: 1px 55px;
     
  }
  
  
  .search-container{
  height:50px;
  use float:right;
  text-align: right;
  }
    </style>



<body>
    <br><br><br><br><br>
	<CENTER><h3>VIEW RESULTS</h3></CENTER>
</body>

<?php

include("Database/connection.php");

if(isset($_POST['submit']))
		{
			$q=mysqli_query($con,"SELECT * from tbl_employreg  where `Name` like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No Data found. Try searching again.";
			}
			else
			{
                
			echo "<div class='col-md-auto'>";
		    echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color:#0A2558; color:white;'>";
				//Table header
				
				echo "<th>"; echo "Name";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Phone";  echo "</th>";
				echo "<th>"; echo "Section";  echo "</th>";
                echo "<th>"; echo "Address";  echo "</th>";

			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr style='background-color: white'>";
				
				echo "<td>"; echo $row['Name']; echo "</td>";
				echo "<td>"; echo $row['Email']; echo "</td>";
				
				echo "<td>"; echo $row['phone']; echo "</td>";
                echo "<td>"; echo $row['Section']; echo "</td>";
                echo "<td>"; echo $row['Address']; echo "</td>";
				

				echo "</tr>";
			}
		echo "</table>";
			}




        }	

        ?>


<?php
      }
?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



