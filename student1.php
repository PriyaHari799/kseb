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




	$get_noti_qwr = "select * from 112_noti where seen_unseen = 'u'";
	$qry = mysqli_query($conn,$get_noti_qwr);
	$count=mysqli_num_rows($qry);
	


?>

<!DOCTYPE html>
<html>
<head>
	<title>sudo rm rf/</title>
</head>
<body>
	<form action="" method="POST" >
		<input style="<?php 

			if($count > 0 ){
				echo "color: white;border:none;background-color: red;";
			}

		 ?>" type="submit" name="submit" value="notification<?php echo '('.$count.')' ?>"/>
	</form>

	<?php

			if(isset($_POST['submit'])){
		

		while ($r=mysqli_fetch_array($qry)){


			echo "--you have a :".$r['type']."<br>It is:".$r['ann']."<br><br>";
			} 
		

		$update_query = "update 112_noti SET seen_unseen='s' where seen_unseen='u';";
		mysqli_query($conn,$update_query);
		
		
	}

	?>
</body>
</html>