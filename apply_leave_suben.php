
<?php

include("Database/connection.php");






                if(extract($_POST))
                {
					
                    $e=$_REQUEST["from"];
                    $f=$_REQUEST["to"];
                    $u=$_REQUEST["leave_type"];
                    $h=$_REQUEST["description"];
                    $d=$_REQUEST["username"];
                    $v=$_REQUEST["section"];
                    $j=$_REQUEST["email"];
            
					
                    $log = array($e, $f);
					foreach ($log as $field)
                    $flag=0;
					if($log=="")
					{
						$flag=1;
						echo "The fields are required";
					}
					  else
                    {
                      
                        $sql = "SELECT * from `tbl_leave` where from_date='$e' and Email='$j'";
                                
        $results=mysqli_query($con,$sql);
	      $row=mysqli_fetch_array($results);
	
        $user=isset($row['from_date']);
        $ema=isset($row['Email']);
        if(($user==$e)&&($ema==$j))
	{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Already applied on this date.');
    window.location.href='view_leave_sub.php';
    </script>");

	}


 else if($e > $f){
      
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Todate must greater than to Fromdate');
    window.location.href='view_leave_sub.php';
    </script>");

}


	  else
		  {
			  $amt="INSERT INTO `tbl_leave` (`name`, `leave_type`, `from_date`, `to_date`, `description`,`total_leave`, `section`,`Email`, `status`) VALUES('$d','$u','$e','$f','$h', DATEDIFF(to_date, from_date)+1,'$v','$j','Pending')";
				$res=mysqli_query($con,$amt);
					if($res)
	{
    echo ("<script LANGUAGE='JavaScript'>
 
    window.location.href='view_leave_sub.php';
    </script>");

	}
		  }



					}
				}
 
?>

