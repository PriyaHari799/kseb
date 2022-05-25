
<?php
include("includes/overheader.php");
include("Database/connection.php");
$id=$_GET["edi"];
$edit=mysqli_query($con, "SELECT * FROM `complaints` where c_id='$id'");
$row=mysqli_fetch_array($edit);

?>

<?php
if (isset($_POST["submit"]))
{
$u=$_POST["username"];
	$e=$_POST["consumer"];
  $d=$_POST["date"];
  $p=$_POST["place"];
		$f=$_POST["status"];
    
		$cont="INSERT INTO `tbl_comstatus` (`username`,`consnum`,`date`,`place`,`com_status`) VALUES('$u','$e','$d','$p','$f')";
				$res=mysqli_query($con,$cont);
				header('location:vcomplaints.php');
       
}
?>






<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>

body{

background-color:#ADD8E6;

}

@import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  background-color: #fff;
  height: 40px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: -100px auto 100px;
  padding: 45px;
 
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color:#3385ff;
  
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  background-color:#ADD8E6;

  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}





  </style>
</head>

<!DOCTYPE html>
<html>
  <body>
  
    <div class="login-page">
    
      <div class="form">
      <h3>Enter Status</h3>
        <form class="login-form" action="" method="post">

        <label for="exampleInputEmail1"> Username:</label>
       <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["username"];?>"  name="username" readonly/>

      <label for="exampleInputEmail1"> Consumer Number:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["consumer"];?>" name="consumer" readonly/>

        <label for="exampleInputEmail1"> Date:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["date"];?>" name="date" readonly/>

        <label for="exampleInputEmail1"> Village:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["village"];?>" name="place" readonly/>


        <label for="exampleInputEmail1">Enter Status:</label>
        <select class="form-select" aria-label="Default select example" name="status" required>
          <option selected>Select One</option>
          <option value="Under Processing">Under Processing</option>
          <option value="Complaint Resolved">Complaint Resolved</option>
         
        </select>
         <br>
          <button type="submit" name="submit" id="submit">Enter</button>
        
        </form>
      </div>
    </div>
</body>
</body>
</html>





    </html>


  



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>