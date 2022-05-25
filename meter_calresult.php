
<?php
include("includes/emp_header.php");
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
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
   
    <style>


    </style>
</head>
<body>

<body>
<!DOCTYPE html>

<head>
	<title>Calculate Electricity Bill</title>
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />

</head>

<?php


if($_SESSION["tarrif"]=="domestic"){
	if($_SESSION['units']<=100){
		$_SESSION['NetAmount']=0.0;
		$_SESSION['subsidary'] =0.0;
		$_SESSION['currcharge'] =0.0;
		$_SESSION['e_tax']=0.0;
		$_SESSION['fix_charge'] =0.0;
	}
	else if($_SESSION['units']>=200 && $_SESSION['units']<=500 ){
		$_SESSION['e_tax']=101.0;
		$_SESSION['fix_charge'] = 10;
		$_SESSION['subsidary'] =10.0;
		$_SESSION['prunit']=2.5;
		$_SESSION['currcharge'] = $_SESSION['prunit'] * $_SESSION['units'];
	    $_SESSION['NetAmount'] = ($_SESSION['units']-100)*2.5 + $_SESSION['fix_charge']+$_SESSION['currcharge']-$_SESSION['subsidary'];
	}
	else if($_SESSION['units']>500){
		$_SESSION['e_tax']=101.0;
		$_SESSION['fix_charge'] = 30;
		$_SESSION['subsidary'] =10.0;
		$_SESSION['prunit']=2.5;
		$_SESSION['currcharge'] = $_SESSION['prunit'] * $_SESSION['units'];
		$_SESSION['NetAmount']= ($_SESSION['units']-100)*5;
		$_SESSION['NetAmount'] = $_SESSION['NetAmount'] +$_SESSION['fix_charge']+$_SESSION['currcharge']-$_SESSION['subsidary'];
	}
	
}
if($_SESSION['tarrif']!="domestic"){
$conn = new mysqli("localhost", "root", "","akseb");

if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
$sql_tarrif = "SELECT fix_charge,prunit,e_tax,subsidary FROM lt_tarrif WHERE tarrif= ". "'".$_SESSION['tarrif']."'";
$result_tarrif = $conn->query($sql_tarrif);
//print_r($result_tarrif);

  $obj = $result_tarrif -> fetch_object();
	$_SESSION['fix_charge'] = $obj->fix_charge;
	$_SESSION['prunit'] = $obj->prunit;
	$_SESSION['e_tax'] = $obj->e_tax;
	$_SESSION['subsidary'] = $obj->subsidary;
  
  $_SESSION['currcharge'] = $_SESSION['prunit'] * $_SESSION['units'];
  $_SESSION['NetAmount'] = $_SESSION['currcharge']+$_SESSION['fix_charge']+$_SESSION['e_tax']-$_SESSION['subsidary'];
}
?>
<br><br><br><br><br>
<br><br>

<div class="container">
    
    <div class="title">DETAILED RESULT</div><BR>
    <div class="content">
    <div id="page-wrap">
		<center>
    <table border="3" width="90%" height="30%">
  <tr>
    <td>Consumed Units</td>
    <td><?php  echo $_SESSION['units']; ?></td>
    
  </tr>
  
  <tr>
    <td>Current Charges (Rs)</td>
    <td><?php echo $_SESSION['currcharge'];?></td>
    
  </tr>

  <tr>
    <td>Fixed Cost (Rs)</td>
    <td><?php echo $_SESSION['fix_charge']?></td>
  </tr>

  <tr>
    <td>E.Tax (Rs)</td>
    <td><?php echo $_SESSION['e_tax']?></td>    
  </tr>

  <tr>
    <td>Subsidy (Rs)</td>
    <td><?php echo $_SESSION['subsidary'];?></td>
    
  </tr>

  <tr>
    <th>Net Amount (Rs)</th>
    <th><?php echo $_SESSION['NetAmount']?></th>
    
  </tr>
</table>

</center>


</div>

	<div>
</body>
</html>
<?php
      }

      ?>








