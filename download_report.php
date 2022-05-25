
<?php

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

<?php

$id=$_GET["del"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_metervisit where v_id='$id'");
 $row=mysqli_fetch_array($edit);

?>




<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
    <style>


body{margin-top:20px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.invoice-container {
    padding: 1rem;
}
.invoice-container .invoice-header .invoice-logo {
    margin: 0.8rem 0 0 0;
    display: inline-block;
    font-size: 1.6rem;
    font-weight: 700;
    color: #2e323c;
}
.invoice-container .invoice-header .invoice-logo img {
    max-width: 130px;
}
.invoice-container .invoice-header address {
    font-size: 0.8rem;
    color: #9fa8b9;
    margin: 0;
}
.invoice-container .invoice-details {
    margin: 1rem 0 0 0;
    padding: 1rem;
    line-height: 180%;
    background: #f5f6fa;
}
.invoice-container .invoice-details .invoice-num {
    text-align: right;
    font-size: 0.8rem;
}
.invoice-container .invoice-body {
    padding: 1rem 0 0 0;
}
.invoice-container .invoice-footer {
    text-align: center;
    font-size: 0.7rem;
    margin: 5px 0 0 0;
}

.invoice-status {
    text-align: center;
    padding: 1rem;
    background: #ffffff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 1rem;
}
.invoice-status h2.status {
    margin: 0 0 0.8rem 0;
}
.invoice-status h5.status-title {
    margin: 0 0 0.8rem 0;
    color: #9fa8b9;
}
.invoice-status p.status-type {
    margin: 0.5rem 0 0 0;
    padding: 0;
    line-height: 150%;
}
.invoice-status i {
    font-size: 1.5rem;
    margin: 0 0 1rem 0;
    display: inline-block;
    padding: 1rem;
    background: #f5f6fa;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.invoice-status .badge {
    text-transform: uppercase;
}

@media (max-width: 767px) {
    .invoice-container {
        padding: 1rem;
    }
}


.custom-table {
    border: 1px solid #e0e3ec;
}
.custom-table thead {
    background: #007ae1;
}
.custom-table thead th {
    border: 0;
    color: #ffffff;
    height: 40px;
}
.custom-table > tbody tr:hover {
    background: #fafafa;
}
.custom-table > tbody tr:nth-of-type(even) {
    background-color: #ffffff;
}
.custom-table > tbody td {
    border: 1px solid #e6e9f0;
    width: 200px;
    height: 60px;
    text-align:center;
}


.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

.text-success {
    color: #00bb42 !important;
}

.text-muted {
    color: #9fa8b9 !important;
}

.custom-actions-btns {
    margin: auto;
    display: flex;
    justify-content: flex-end;
}

.custom-actions-btns .btn {
    margin: .3rem 0 .3rem .3rem;
}



    </style>
</head>
<html>
    <br>
  <body>

  <div class="container" id="divToPrint">
    <div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-header">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="custom-actions-btns mb-5">
									
										
									</div>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start --><CENTER><h2>REPORT</h2>
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<a href="index.html" class="invoice-logo">
                 
									</a>
								</div><BR>
								<div class="col-lg-6 col-md-6 col-sm-6">
                  
									<address class="text-right">
                 
									<h5>Name:<?php echo $row['Name']?></h5>
									<h6>Section:<?php echo $row['Section']?></h6><br>
									</address>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							
							<!-- Row end -->
						</div>
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-lg-12">
									<div class="table-responsive"><CENTER>
										<table class="table custom-table m-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
                                                    <th>date</th>
													<th>Phone</th>
													<th>Section</th>
                                                    <th>Number of Visit</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
													<?php echo $row['Name']?>
														
													</td>
                                                     <td><?php echo $row['Email']?></td><br>
													<td>	<?php echo $row['date']?></td>
													<td>	<?php echo $row['Phone']?></td>
													<td><?php echo $row['Section']?></td>
                                                    <td><?php echo $row['num_visit']?></td>
												</tr>
												<tr>
													
											</tbody>
										</table></CENTER>
									</div>
								</div>
							</div></CENTER><br><br><br><br><br>
							<!-- Row end -->
						</div>
						<div class="invoice-footer">
							
						</div>
           
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<center><input type="button"  value="print" onclick="PrintDiv();" />&nbsp;&nbsp;<a href="view_meter_reports.php">Back to Home</a></center>

<center></center>
</body>
  </html>

  <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>




<?php
	}
?>
		
	