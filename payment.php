
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
    
    
    <style>

body {
  background-image: url("images/shome.jpg");
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
        color: #9ABC66;
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
<center>
            <body>
      <div class="card">
      <div style="border-radius:150px; height:150px; width:150px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Payment Success</h1> 
        <p>Your Payment Processed Successfully...</p>
      </div>
    </body>
    </center>



            

</html>


<?php
      }
?>