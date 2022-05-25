<?php 


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

	


<!DOCTYPE html>
<html>
<head>
	<title>do it</title>
</head>
<body>
		<!--class 1 -->
		<form action="" method="POST">
			<input type="text" name="announce"/><br/>

			<input type="radio" name="tsk" value="announcement"/>Announcement
			<input type="radio" name="tsk" value="task" />Task<br/>

			<input type="radio" name="cls" value="cse101"/>CSE101
			<input type="radio" name="cls" value="cse102" />CSE102<br/>

			<input type="submit" name="submit" value="Submit"/>
		</form>

		<?php 
			//insert announcement in desire class table
			if(isset($_POST['submit'])){
				$ann = $_POST['announce'];
				$tsk = $_POST['tsk'];
				$cls = $_POST['cls']; 
				$class_insert_qry = "insert into ".$cls."_ann (type,ann,date) values ('$tsk','$ann','$dat');";
				if(mysqli_query($conn,$class_insert_qry)){
					echo "announced";
				}
				else die("error".mysqli_error($conn));


				//then get the class student id and put the announcement in to student notifation table
				$get_student="Select * from ".$cls."_student";
				$get_id=mysqli_query($conn,$get_student);
				while($r=mysqli_fetch_array($get_id)) {

					$noti_query = "insert into ".$r['id']."_noti (type,ann,seen_unseen) values ('$tsk','$ann','u');";

					mysqli_query($conn,$noti_query) or die ("Error".mysqli_error($conn));

						}
			}

		?>
</body>
</html>
<?php
	  }
	  ?>