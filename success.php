<?php
include("includes/admin_header.php");
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

<html>
    <head>
    
    
    <style>

body {
  background-image: url("images/intro-bg.jpg");
  background-color:#cce0ff;
  
}

        h1 {
          color: #fffff;
          
          
        
          margin-bottom: 10px;
        }
        p {

         
          font-size:20px;
          margin: 0;
        }
      i {
        color:white;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    






    </style>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
</head>

<body>
<div id="content">

       


</head>
<center><br><br><br><br><br><br><br>   
            <body>
            <div class="card" style="width: 32rem;">
      <div style="border-radius:150px; height:150px; width:150px; background:#0A2558; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h4> Successfully Completed</h4> 
       
        
      </div>
    </body>
    </center>



            

</html>

<?php
      }
      ?>