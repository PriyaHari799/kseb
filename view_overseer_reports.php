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


$id=$_GET["del"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_report  where re_id='$id'");
 $row=mysqli_fetch_array($edit);

?>



<html>
<head>
<style>

body{

background-color:white;

}
.content{

height: 200px;


}

.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .7rem;
    border-bottom: 1px dotted black;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: black;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}


</style>


</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">

       <br>

    <div class="page-tools">
            <div class="action-buttons">
               

                    <button type="button"  class="btn btn-primary"><a href="view_report.php" style="color:white;">Back</a></button>

                </a>
                
            </div>
        </div>
    </div>
       
    <div class="container px-0" id="divToPrint" >
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                           
                            <span class="text-default-d3"><B><H3>OVERSEER REPORT</H3></B></span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-600 text-110 text-blue align-middle">Title:</span>
                            <span class="text-600 text-110 text-blue align-middle"><?php echo $row['title'];?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                            <span class="text-600 text-110 text-blue align-middle">Employee Name:</span>
                            <span class="text-600 text-110 text-blue align-middle"><?php echo $row['name'];?></span>
                            </div>
                            <div class="my-1">
                            <span class="text-600 text-110 text-blue align-middle">Section:</span>
                            <span class="text-600 text-110 text-blue align-middle"><?php echo $row['section'];?></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            
                            </div>


                            <div class="my-2"> <span class="text-600 text-110 text-blue align-middle">Date: <?php echo $row['date'];?></span> </div>

                            <div class="my-2"><span class="text-600 text-110 text-blue align-middle">Email Id: <?php echo $row['email'];?></span> <span class="badge badge-warning badge-pill px-25"></span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="content1">
                    <br>
              

                <?php echo $row['record'];?>



               

                  

                    <div><br><br>
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


<button type="button"  class="btn btn-primary"  onclick="PrintDiv();"style="margin-left: 100px;"><i class="mr-1 fa fa-print" ></i>Print</button>

<button type="button"  class="btn btn-primary"style="margin-left: 900px;"> <a href="view_report.php" style="color:white;">Back</a></button>
</body>

<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

    </html>
  

    
<?php
      }
      ?>