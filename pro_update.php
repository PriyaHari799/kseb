
<?php
include("includes/sub_header.php");
include("Database/connection.php");
        

$username =$_SESSION["Email"];
$edit=mysqli_query($con, "SELECT * FROM tbl_employreg  where Email='$username'");
$row=mysqli_fetch_array($edit);


if (isset($_POST["submit"]))
{
$name=$_POST["name"];
 $position=$_POST["position"];
   
   $email=$_POST["email"];
   $section=$_POST["section"];

   $ow=$_FILES['ownership']['name'];
   $ow_type=$_FILES['ownership']['type'];
   $ow_size=$_FILES['ownership']['size'];
   $ow_tem_loc=$_FILES['ownership']['tmp_name'];
  $ow_store="pdf/".$ow;
  move_uploaded_file($ow_tem_loc,$ow_store); 

  $uname=$_SESSION["Email"];
  $query = "SELECT * FROM tbl_promotion WHERE Email = '$uname'";
  $result1 = mysqli_query($con, $query);
  if(mysqli_num_rows($result1))
        {
          
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Already Applied');
          window.location.href='pro_update.php';
        </script>");
        }
      else{
    
      $cont="INSERT INTO `tbl_promotion` (`name`,`position`,`ownership`,`email`,section) VALUES('$name','$position','$ow','$email','$section')";
          $res=mysqli_query($con,$cont);
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Success');
          window.location.href='pro_update.php';
        </script>");
        
  }
}
?>


<html>
<head>

<link rel='stylesheet' href='stylesheet/leave.css' type='text/css' />
<style>
body{

background-color:white;


}
  </style>
</head>
<body>

<br><br><br><Br>


   <body>
<BR><BR>

<div class="container">

  
    <div class="title">Promotion Update Request</div>
    <div class="content">
        
      <form method="post"  name="frmcstreg" onSubmit="return validatecstreg()" enctype="multipart/form-data">
        <div class="user-details">

        <div class="input-box">
            <span class="details">Proof of promotion</span>
            <input type="file" name="ownership"  placeholder="Proof of Owership">
          </div>

          <div class="input-box">
            <span class="details">Select the Position</span>
          
            <select class="form-control" name="position" id="exampleFormControlSelect1">
      <option value="">Select One</option>
      <option>Assistant Engineer</option>
      <option>Engineer</option>
  
  
      
      </select>

          </div>

          <div class="input-box">
            <span class="details">E-mail</span>
            <input type="text" name="email" id="place" value="<?php echo $row['Email']?>" placeholder="Enter your Email">
          </div>
         

          
          <div class="input-box">
            <span class="details">Section</span>
            <input type="text" name="section" value="<?php echo $row['Section']?>"  placeholder="">
          </div>
     
          

         
            <input type="text" name="name" value="<?php echo $row['Name']?>"  placeholder="Enter Building Name" hidden>
      

        </div>
        
        <div class="button">
            <input type="submit" value="Apply" name="submit">
            
          </div>

      </form>
    </div>
</div>
</body>
 
</body>
</center>                    
</html>








    </body>
</html>

<script type="application/javascript">
  function validatecstreg()
  {
  
  var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
  var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
  var numericExpression = /^\d{4}$/; //Variable to validate only numbers
  var numericExp = /^\d{13}$/; //Variable to validate only numbers
  

 if(document.frmcstreg.ownership.value == "")
    {
      alert("Upload the proof of promotion");
      document.frmcstreg.ownership.focus();
      return false
      
    }
    
 else if(document.frmcstreg.position.value == "")
    {
      alert("Enter the position");
      document.frmcstreg.position.focus();
      return false
      
    }

    else(){
      
    }


    else
    {
      return true;
    }
  }
  
</script>
    
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</html>




