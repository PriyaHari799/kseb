
<?php

include("Database/connection.php");






                if(extract($_POST))
                {
					
                  $name=$_REQUEST["names"];
                  $query = "SELECT `name` FROM `tbl_usereg` WHERE `reg_id` = '$name'";
                  $res = mysqli_query($con,$query);
                  $row = mysqli_fetch_array($res);
                  $name1=$row["name"];
                  $cons=$_REQUEST["consnumber"];
                  $unit=$_REQUEST["unit"];
            $gendate=$_REQUEST["gendate"];
            
                  $duedate=$_REQUEST["duedate"];
                  $disdate=$_REQUEST["disdate"];
                 
                  $payamount=$_REQUEST["payamount"];
            
					
                    $log = array($gendate, $name);
					foreach ($log as $field)
                    $flag=0;
					if($log=="")
					{
						$flag=1;
						echo "The fields are required";
					}
					  else
                    {
                       
                        $sql = "SELECT `c_name`, `c_number`, `c_unit`, `gen_date`, `duedate`, `discon_date`, `pay_amount`, `status`, `date` from `tbl_billdetails` where gen_date='$gendate' and c_name='$name1'";
                                
                        $results=mysqli_query($con,$sql);
                          $row=mysqli_fetch_array($results);
                    
                        $user=isset($row['gen_date']);
                        $ema=isset($row['c_name']);

                        
    if(($user==$gendate)&&($ema==$name1))
	{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Bill Already generated on this month.');
    window.location.href='billen.php';
    </script>");

	}


 else if($duedate > $disdate){
      
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Disconnection date must be greater than Duedate');
    window.location.href='billen.php';
    </script>");

}



	  else
		  {
			  $amt="INSERT INTO `tbl_billdetails` (`c_name`, `c_number`, `c_unit`, `gen_date`, `duedate`, `discon_date`, `pay_amount`, `status`, `date`) VALUES('$name1','$cons','$unit','$gendate','$duedate', '$disdate','$payamount','Pending',curdate())";
				$res=mysqli_query($con,$amt);
					if($res)
	{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Bill Generated Successfully');
    window.location.href='billen.php';
    </script>");

	}
		  }



					}
				}
 
?>

<html>

<head>
  <style>

body{

background-color:white;

}


    </style>
      </head>


  </html>