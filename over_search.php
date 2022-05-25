

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
body{

    background-color:#ADD8E6;

}


.search-container{
height:50px;
use float:right;
text-align: right;
}




</style>

<body>
    <br><br><br><br>
	<CENTER><h3>VIEW RESULTS</h3></CENTER><br>
</body>

<?php

include("Database/connection.php");

if(isset($_POST['submit']))
		{
			$q=mysqli_query($con,"SELECT * from tbl_employreg where `Section` like '%$_POST[search]%' and Type_Id=2");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No Data found. Try searching again.";
			}
			else
			{
                
			echo "<div class='col-md-auto'>";
		    echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color:#0A2558; color:white;'>";
				//Table header
				
				echo "<th>"; echo "Name";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Phone";  echo "</th>";
				echo "<th>"; echo "Section";  echo "</th>";
				
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr style='background-color: white'>";
				
				echo "<td>"; echo $row['Name']; echo "</td>";
				echo "<td>"; echo $row['Email']; echo "</td>";
				echo "<td>"; echo $row['phone']; echo "</td>";
				echo "<td>"; echo $row['Section']; echo "</td>";
				
				

				echo "</tr>";
			}
		echo "</table>";
			}




        }	

        ?>


<?php
      }
?>