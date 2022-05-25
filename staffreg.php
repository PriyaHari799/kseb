<?php
    session_start();
    include("Database/connection.php");
    if(isset($_SESSION['Email']))
{
          
          $lmail= $_SESSION['Email'];


          $sqli = "select Name from tbl_employreg where Email = '$lmail'";
          $resulti = mysqli_query($con,$sqli);
          $row = mysqli_fetch_array($resulti);

          $sql = "select * from tbl_employreg where Email = '$lmail' ";
          $resulti = mysqli_query($con,$sql);
          $row = mysqli_fetch_array($resulti);
          $type_id =  $row['Type_Id'];

          
           

                

}

    
 if (isset($_POST['register'])){
    


    $name = $_POST['names'];
    $add = $_POST['Address'];
    $mail = $_POST['umail'];
    $phone = $_POST['phone'];
    $section=$_POST['section'];
	  $password = $_POST['password'];
    $type_id =  $_POST['staff_type'];

    
    $sqli = "select Email from tbl_employreg where Email = '".$mail."'";
    $resulti = mysqli_query($con,$sqli);
    if(mysqli_num_rows($resulti)>0)  
    {  
        
      echo ("<script>
      window.alert('Already Registered User');
      window.location.href = 'employereg.php';
      </script>");
    }

  else{
 
        $sqli = "insert into tbl_employreg(Type_Id,Name,Address,Email,phone,Section,Password) values('$type_id','$name','$add','$mail','$phone','$section','$password')";
        echo $sqli;
        if(mysqli_query($con,$sqli))
        {
           header('location: emplogin.php');
        }

  //}
  //}

 
    }



         mysqli_close($con);

 }

	  ?>
      

  