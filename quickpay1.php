<?php



                if(extract($_POST))
                {
					
                    include 'Database/connection.php';
                  
                    $username = $_REQUEST['username'];
                    $date =$_REQUEST['date'];
					$a=$_REQUEST['consumer'];
					$b=$_POST['unit'];
					$c=$_POST['amount'];
					$dued=$_POST['duedate'];
					$dis=$_POST['disdate'];
					$damount=$_POST['damount'];
					$tamount=$_POST['tamount'];
                    $log = array($username, $date);
					foreach ($log as $field)
                    $flag=0;
					if($log=="")
					{
						$flag=1;
						echo "The fields are required";
					}
					  else
                    {
                      
                        $sql = "SELECT `consumer`,`date` from bill where consumer='{$a}' and `date`='{$date}'";
                                
        $results=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($results);
	
        $user=$row['consumer'];
	$pas=$row['date'];
	if(($user==$a)&&($date==$pas ))
	{
    	echo ("<script LANGUAGE='JavaScript'>
        window.alert('Already pay this bill');
        window.location.href='quickpay.php';
      </script>");
		
	}
	      else
		  {
			  $amt="INSERT INTO `bill` (`consumer`, `username`, `unit`, `bill amount`, `date`, `duedate`, `discondate`, `dueamount`, `tamount`) VALUE('$a','$username','$b','$c',curdate(),'$dued','$dis','$damount','$tamount')";
				$res=mysqli_query($con,$amt);
					if($res)
	{
			header('location:card.php');
	}
		  }
					}
				}
 
?>