
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

<?php
 $username =$_SESSION["username"];
 $edit=mysqli_query($con, "SELECT * FROM tbl_usereg  where username='$username'");
 $row=mysqli_fetch_array($edit);


if (isset($_POST["submit"]))
{
$u=$_POST["username"];
	$e=$_POST["consumer"];
		$f=$_POST["mobile"];
    $h=$_POST["description"];
		$d=$_POST["district"];
    $v=$_POST["village"];
		$cont="INSERT INTO `complaints` (`username`,`consumer`, `mobile`,`description`,`district`,`village`,`date`,`time`,`status`) VALUES('$u','$e','$f','$h','$d','$v',curdate(),curtime(),'Pending')";
				$res=mysqli_query($con,$cont);
				header('location:comessage.php');
       
}
?>







<html>
    <head>
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
   
    <style>

body {
  background-image: url("images/shome.jpg");
  background-color:#cce0ff;
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


</head>
<body>



<div class="container">

    <center><img src="images/4.jpg" alt="" class="img-fluid" width="10%" height="10%"></center>
    <div class="card text-white bg-primary mb-3" style="width: 9rem; font-size:16px;">
<center><a href="complaint.pdf" download="Complaint Form" target="_blank" class="et_pb_button" style="color: #fffff;">Registration Form<i class="fa fa-download" style="font-size:25px;color:white"></i><center></a>

</div>
    <div class="title">Complaint Registration</div>
    <div class="content">
        
      <form method="post" action="#" name="frmcstreg" onSubmit="return validatecstreg()">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Your Name</span>
            <input type="text" name="username" value="<?php echo $row['username']?>" placeholder="Enter Consumer Number" readonly>
          </div>
          <div class="input-box">
            <span class="details">Your Consumer Number</span>
            <input type="text" name="consumer" value="<?php echo $row['consnumber']?>" placeholder="Enter Consumer Number" readonly>
          </div>

          <div class="input-box">
            <span class="details">Mobile number</span>
            <input type="number" name="mobile" id="mobile" placeholder="Mobile Number">
          </div>

          
          <div class="input-box">
            <span class="details">District</span>
            
            <select class="form-control" id="district" name="district" id="exampleFormControlSelect1" onchange="populate(this.id,'village')">
      <option value="">Choose District</option>
      <option value="Thiruvanathapuram">Thiruvanathapuram</option>
      <option value="Kollam">Kollam</option>
      <option value="Pathanamthitta">Pathanamthitta</option>
      <option value="Alappuza">Alappuza</option>
      <option value="Kottyam">Kottyam</option>
      <option value="Idukki">Idukki</option>
      <option value="Ernakulam">Ernakulam</option>
      <option value="Thrissur">Thrissur</option>
      <option value="Palakkad">Palakkad</option>
      <option value="Malappuram">Malappuram</option>
      <option value="Wayanad">Wayanad</option>
      <option value="Kozikkode">Kozikkode</option>
      <option value="Kannur">Kannur</option>
      <option value="Kasargode">Kasaragode</option>
      
    </select>
          </div>

          <div class="input-box">
            <span class="details">Village</span>
            
            <select class="form-control" id="village" name="village" id="exampleFormControlSelect1">
      
    </select>
          </div>


          


          <div class="input-box">
            <span class="details">Enter Your Complaint</span>
            <textarea class="form-control" rows="2" id="comment" name="description" placeholder="Complaint"></textarea>
          </div>
          
        
        </div>
        
        <div class="button">
            <input type="submit" value="Register" name="submit">
            
          </div>
          
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
</body>
 
</html>

 
<script>


function populate(s1,s2)
{

var s1=document.getElementById(s1);
var s2=document.getElementById(s2);

s2.innerHTML="";

if(s1.value=="Thiruvanathapuram")
{
var optionArray=['chirayinkeezhu|Chirayinkeezhu','nedumangad|Nedumangad','neyyattinkara|Neyyattinkara','cheruvakkal|Cheruvakkal'
,'kadakampally|Kadakampally','keezhthonakkal|Keezhthonakkal','menamkulam|Menamkulam','muttathara|Muttathara','nemom|Nemom'];
}

else if(s1.value=='Kollam')

{

  var optionArray=['mulavan|Mulavanhu','panayam|Panayam','kadakkal|Kadakkal','kalayapuram|Kalayapuram','kalluvathukkal|Kalluvathukkal'
  ,'kareepra|Kareepra','kilikollur|Kilikollur','odanavattam|Odanavattam','pattazhy|Pattazhy'];

}

else if(s1.value=='Pathanamthitta')

{

  var optionArray=['kozhenchery|Kozhenchery','mallappally|Mallappally','ranni|Ranni','eraviperoor|Eraviperoor','thiruvalla|Thiruvalla'
  ,'ezhumattoor|Ezhumattoor','puramattam|Puramattam','omalloor|Omalloor','kodumon|Kodumon','perunad|Perunad'];

}


else if(s1.value=='Alappuza')

{

  var optionArray=['aroor|Aroor','cherthala Vadakku|Cherthala Vadakku','ezhupunna|Ezhupunna','mararikkulam Vadakku|Mararikkulam Vadakku','pattanakkad|Pattanakkad'
  ,'thuravur Thekku|Thuravur Thekku','vayalar East|Vayalar East','perumbalam|Perumbalam','pattanakkad|Pattanakkad','kadakkarappally|Kadakkarappally'];

}

else if(s1.value=='Kottyam')

{

  var optionArray=['changanacherry|Changanacherry','ponkunnam|Ponkunnam','kangazha|Kangazha','karukachal|Karukachal','kurichy|Kurichy','kanjirappally|Kanjirappally'
  ,'koovappally|Koovappally','koruthodu|Koruthodu','manimala|Manimala','mundakayam|Mundakayam','akalakunnam|Akalakunnam','nattakom|Nattakom'];

}


else if(s1.value=='Idukki')

{

  var optionArray=['pallivasal|Pallivasal','pampadumpara|Pampadumpara','vattavada|Vattavada','vellathuval|Vellathuval','santhanpara|Santhanpara'
  ,'alacode|Alacode','elappara|Elappara','peruvanthanam|Peruvanthanam','vagamon|Vagamon','muttom|Muttom'];

}


else if(s1.value=='Ernakaualam')

{

  var optionArray=['angamaly|Angamaly','pattimattom|Pattimattom','Kombanad|Kombanad','kalady|Kalady','vadavukode|Vadavukode'
  ,'memury|Memury','neriamangalam|Neriamangalam','piravom|Piravom','onakkoor|Onakkoor','mulamthuruthy|Mulamthuruthy'];

}


else if(s1.value=='Thrissur')

{

  var optionArray=['aroor|Aroor','cherthala Vadakku|Cherthala Vadakku','ezhupunna|Ezhupunna','mararikkulam Vadakku|Mararikkulam Vadakku','pattanakkad|Pattanakkad'
  ,'thuravur Thekku|Thuravur Thekku','vayalar East|Vayalar East','perumbalam|Perumbalam','pattanakkad|Pattanakkad','kadakkarappally|Kadakkarappally'];

}


else if(s1.value=='Palakkad')

{

  var optionArray=['kadappuram|Kadappuram','kaduppassery|Kaduppassery','mayannur|Mayannur','punnayur|Punnayur','manalithara|Manalithara'
  ,'mangad|Mangad','talikkulam|Talikkulam','eyyal|Eyyal','kakkulissery|Kakkulissery','kandanissery|Kandanissery'];

}


else if(s1.value=='Malappuram')

{

  var optionArray=['anamangad|Anamangad','ambalakkadavu|Ambalakkadavu','kunnumpuram|Kunnumpuram','puthuponnani|Puthuponnani','kundoor|Kundoor'
  ,'thuravur Thekku|Thuravur Thekku','vayalar East|Vayalar East','perumbalam|Perumbalam','pattanakkad|Pattanakkad','kadakkarappally|Kadakkarappally'];

}



else if(s1.value=='Wayanad')

{

  var optionArray=['aroor|Aroor','cherthala Vadakku|Cherthala Vadakku','ezhupunna|Ezhupunna','mararikkulam Vadakku|Mararikkulam Vadakku','pattanakkad|Pattanakkad'
  ,'thuravur Thekku|Thuravur Thekku','vayalar East|Vayalar East','perumbalam|Perumbalam','pattanakkad|Pattanakkad','kadakkarappally|Kadakkarappally'];

}


else if(s1.value=='Kozikkode')

{

  var optionArray=['aroor|Aroor','cherthala Vadakku|Cherthala Vadakku','ezhupunna|Ezhupunna','mararikkulam Vadakku|Mararikkulam Vadakku','pattanakkad|Pattanakkad'
  ,'thuravur Thekku|Thuravur Thekku','vayalar East|Vayalar East','perumbalam|Perumbalam','pattanakkad|Pattanakkad','kadakkarappally|Kadakkarappally'];

}


else if(s1.value=='Kannur')

{

  var optionArray=['aroor|Aroor','cherthala Vadakku|Cherthala Vadakku','ezhupunna|Ezhupunna','mararikkulam Vadakku|Mararikkulam Vadakku','pattanakkad|Pattanakkad'
  ,'thuravur Thekku|Thuravur Thekku','vayalar East|Vayalar East','perumbalam|Perumbalam','pattanakkad|Pattanakkad','kadakkarappally|Kadakkarappally'];

}


else if(s1.value=='Kasargaode')

{

  var optionArray=['aroor|Aroor','cherthala Vadakku|Cherthala Vadakku','ezhupunna|Ezhupunna','mararikkulam Vadakku|Mararikkulam Vadakku','pattanakkad|Pattanakkad'
  ,'thuravur Thekku|Thuravur Thekku','vayalar East|Vayalar East','perumbalam|Perumbalam','pattanakkad|Pattanakkad','kadakkarappally|Kadakkarappally'];

}











for(var option in optionArray){

var pair=optionArray[option].split("|");
var newoption=document.createElement("option");
newoption.value=pair[0];
newoption.innerHTML=pair[1];
s2.options.add(newoption);

}

}


  </script>









<script type="application/javascript">
  function validatecstreg()
  {
  
      var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
      var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
      var numericExpression = /^\d{10}$/; //Variable to validate only numbers
      var numericExp = /^\d{13}$/; //Variable to validate only numbers
      
      if(document.frmcstreg.mobile.value == "")
    {
      alert("Kindly enter your Mobile Number.");
      document.frmcstreg.mobile.focus();
      return false;
    }	


    else if(document.frmcstreg.mobile.value == "")
    {
      alert("Kindly enter your Mobile Number.");
      document.frmcstreg.mobile.focus();
      return false;
    }	
  
   else if(!document.frmcstreg.mobile.value.match(numericExpression))
    {
      alert("Mobile number must be 10 digits.");
      document.frmcstreg.mobile.focus();
      return false;
    }	

    if(document.frmcstreg.district.value == "")
    {
      alert("Kindly enter your district.");
      document.frmcstreg.district.focus();
      return false;
    }	
    
    if(document.frmcstreg.description.value == "")
    {
      alert("Kindly enter complaint.");
      document.frmcstreg.description.focus();
      return false;
    }	
    
 
     
    else
    {
      return true;
    }

  }
  
  </script> 










<?php
	}
?>
		
	