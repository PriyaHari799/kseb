
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
<?php
$username =$_SESSION["Email"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_employreg  where Email='$username'");
 $row=mysqli_fetch_array($edit);


?>


<html>

  <head>
  
  <style>
body{

background-color:#ADD8E6;

}

.publish-btn{

width:15%;
padding:10px;
background-color:#003366;
color:white;



}

.container{

background-color:white;



}





</style>    

</head>


<body>
<br><BR><BR><BR>
<H4><CENTER>GENERATE REPORT</CENTER></H4>
<i><h6 style="margin-left:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Follow this format: <a href="pdf/OVERSEER REPORT.pdf">sample_document</a></h6></i><br>
<div class="container">

<form action="process.php" method="post" name="frmcstreg" onSubmit="return validatecstreg()">

<div class="input-field">
<br>
<label for="title"> Enter Title</label>

<input type="text" name="Article_title" id="Article_title" style="width:60%;">

<input type="text" name="name" value="<?php echo $row['Name']?>"   id="title"  hidden>

<input type="text" name="email"  value="<?php echo $row['Email']?>"  id="title"  hidden>

<input type="text" name="section"  value="<?php echo $row['Section']?>"  id="title"  hidden>

</div><br>
<textarea name="Article_content" id="Article_editor" cols="100"></textarea>
<br>
<input type="submit" class="publish-btn" name="submit_data" value="Submit">

<br>


<a href="view_report.php" style="margin-left:1000px;">View Report</a>

</div>

<script src="ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('Article_editor');


</script>

</body>
</html>


<script type="application/javascript">
  function validatecstreg()
  {
  
      var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
      var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
      var numericExpression = /^\d{10}$/; //Variable to validate only numbers
      var numericExp = /^\d{13}$/; //Variable to validate only numbers

      if(document.frmcstreg.Article_title.value == "")
    {
      alert("Enter the title.");
      document.frmcstreg.Article_title.focus();
      return false;
    }	
      
     else if(document.frmcstreg.Article_content.value == "")
    {
      alert("Create Report before submit.");
      document.frmcstreg.Article_content.focus();
      return false;
    }	
  }
</script>





<?php
    }
    ?>