

<?php
include("includes/overheader.php");
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
    <br><br><br><br><br><br>
	<CENTER><h3>VIEW RESULTS</h3></CENTER>
</body>

<?php

include("Database/connection.php");

if(isset($_POST['submit']))
		{
			$q=mysqli_query($con,"SELECT * from complaints where `village` like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No Data found. Try searching again.";
			}
			else
			{

               


                
			echo "<div class='col-md-auto'>";
		    echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color:#292b2c; color:white;'>";
				//Table header
				
				echo "<th>"; echo "Consumer Name";  echo "</th>";
				echo "<th>"; echo "Consumer Number";  echo "</th>";
				echo "<th>"; echo "Phone Number";  echo "</th>";
				echo "<th>"; echo "Date";  echo "</th>";
				echo "<th>"; echo "District";  echo "</th>";
                echo "<th>"; echo "Village";  echo "</th>";
                echo "<th>"; echo "Description";  echo "</th>";
                echo "<th>"; echo "Enter Status";  echo "</th>";
                echo "<th>"; echo "Status";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr style='background-color: white'>";
				
				echo "<td>"; echo  $row['username']; echo "</td>";
				echo "<td>"; echo $row['consumer']; echo "</td>";
				echo "<td>"; echo $row['mobile']; echo "</td>";
				echo "<td>"; echo $row['date']; echo "</td>";
                echo "<td>"; echo $row['district']; echo "</td>";
                echo "<td>"; echo $row['village']; echo "</td>";
                echo "<td>"; echo $row['description']; echo "</td>";
				
				echo"<td>";
                            
             echo" <form action='status_update.php' method='POST'>
              
              <select class='custom-select' id='inputGroupSelect01' name='status'>
                  <option selected>Choose</option>
                  <option value='Pending'>Pending</option>
                  <option value='Recieved'>Recieved</option>
                  <option value='Progressing'>Progressing</option>
                  <option value='Completed'>Completed</option>
                 
                </select>
                <button class='btn btn-danger' value='" . $row['c_id'] . "' name=rbtn>Update</button>
                
              </form>";

             echo "</td>";




              echo"<td scope='row'>";
            if ($row['status'] == 'Pending') {
              echo "<p class='card-text text-danger'><b>PENDING</b></p>";
            } else if ($row['status'] == 'Recieved') {
              echo "<p class='card-text text-secondary'><b>RECIEVED</b></p>";
            } else if ($row['status'] == 'Progressing' ) {
              echo "<p class='card-text text-warning'><b>PROGRESSING</b></p>";
            } else if ($row['status'] == 'Completed') {
              echo "<p class='card-text text-success'><b>COMPLETED</b></p>";
            }  else {
            }
            echo "</th>";
            



            //echo "<td scope='row'><a class='btn btn-light' name='mbtn' value='hai' href='adminuserdetail.php?id=" . $row['id'] . "'>Show</a></th>
           echo " </tr>";
          }
        }

				echo "</tr>";
			}
		echo "</table>";
			}




        

        ?>


<?php
      
?>