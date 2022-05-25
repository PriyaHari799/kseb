
<?php


include("Database/connection.php");
                if(extract($_POST))
                {
					
               
                  
                    $username = $_REQUEST['username'];
                    $bname = $_REQUEST['bname'];
					$bnumber = $_REQUEST['bnumber'];
				   $email=$_REQUEST['email'];
           $district=$_REQUEST['district'];
           $village=$_REQUEST['village'];
           $purpose=$_REQUEST['purpose'];
           $a_status=$_REQUEST['astatus'];

           $ow=$_FILES['ownership']['name'];
           $ow_type=$_FILES['ownership']['type'];
           $ow_size=$_FILES['ownership']['size'];
           $ow_tem_loc=$_FILES['ownership']['tmp_name'];
          $ow_store="pdf/".$ow;
          move_uploaded_file($ow_tem_loc,$ow_store); 


          $proof=$_FILES['identity']['name'];
          $proof_type=$_FILES['identity']['name'];
          $proof_size=$_FILES['identity']['name'];
          $proof_tem_loc=$_FILES['identity']['tmp_name'];
         $proof_store="pdf/".$proof;
         move_uploaded_file($proof_tem_loc,$proof_store); 

      
        
                    $log = array($username, $bnumber);
					foreach ($log as $field)
                    $flag=0;
					if($log=="")
					{
						$flag=1;
						echo "The fields are required";
					}
					  else
                    {
                      
                        $sql = "SELECT username,bnumber from newconnect where username='{$username}' and bnumber='{$bnumber}'";
                                
        $results=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($results);
	
        $user=$row['username'];
	$pas=$row['bnumber'];
	if(($user==$username)&&($pas==$bnumber ))
	{
		header('location:conalready.php');
	}
	      else
		  {
			  $amt="INSERT INTO `newconnect` (`username`, `bname`, `bnumber`, `email`, `district`, `Section`, `date`, `purpose`, `appstatus`,`p_ownership`,`p_identity`,`status`) VALUE('$username','$bname','$bnumber','$email','$district','$village',curdate(),'$purpose','$a_status','$ow','$proof','Pending')";
				$res=mysqli_query($con,$amt);
					if($res)
	{
			header('location:consuccess.php');
	}
		  }
					}
				}
 
?>




<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' href='stylesheet/consreg.css' type='text/css' />
   
    <style>

body {
  background-image: url("images/intro-bg.jpg");
  background-color:#cce0ff;
  
  background-attachment: fixed;
}
    </style>
</head>
<body>
<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="meterhome.php">
      <img src="images/log.png" alt="" width="40" height="35" class="d-inline-block align-text-top">
      <b>KSEB NEW CONNECTION PORTAL</b>
    </a>
                   

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                          
                        <li class="nav-item">
                        <a href="index.php"><button type="button" class="btn btn-primary btn-arrow-left"><i class='fas fa-angle-double-left'></i>BACK TO HOME</button></a>
                            </li>&nbsp;&nbsp;

                            
                        
                        </ul>
                    </div>
                </div>
            </nav>


</head>
<body>

&nbsp;&nbsp;<div class="card text-dark bg-white mb-3" style="width: 14rem; height: 1%; font-size:16px;">
<div class="card body">
  You can directly apply for the connection by download this form.
<a href="newconnection.pdf" download="New Connection Form" target="_blank" class="et_pb_button" style="color: #fffff;">Download Here</a>
</div>
</div>

<div class="container">

  
    <div class="title">New Connection</div>
    <div class="content">
        
      <form method="post" action="#" name="frmcstreg" onSubmit="return validatecstreg()" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name of Applicant</span>
            <input type="text" name="username" placeholder="Enter Applicant Name">
          </div>

          <div class="input-box">
            <span class="details">Building Name</span>
            <input type="text" name="bname"  placeholder="Enter Building Name">
          </div>

          
          <div class="input-box">
            <span class="details">Building Number</span>
            <input type="number" name="bnumber"  placeholder="Enter Building Number">
          </div>
     
          <div class="input-box">
            <span class="details">E-mail</span>
            <input type="text" name="email" id="place" placeholder="Enter your Email">
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
            <span class="details">Purpose of Supply</span>
          
            <select class="form-control" name="purpose" id="exampleFormControlSelect1">
      <option value="">Select One</option>
      <option>Domestic</option>
      <option>Commercial</option>
      <option>Industrial</option>
      
      </select>

          </div>
          <div class="input-box">
            <span class="details">Status of Applicant</span>
            <select class="form-control" name="astatus" id="exampleFormControlSelect1">
            <option value="">Select One</option>
            <option>Owner</option>
            <option>Tenant</option>
            
          </select>
          </div>
    
          <div class="input-box">
            <span class="details">Proof of Ownersip/Tentative</span>
            <input type="file" name="ownership"  placeholder="Proof of Owership">
          </div>
          <div class="input-box">
            <span class="details">Proof of Identity</span>
            <input type="file" name="identity"  placeholder="Proof of Identity">
          </div>
          


        </div>
        
        <div class="button">
            <input type="submit" value="Apply" name="submit">
            
          </div>

      </form>
    </div>
</div>
<br><br>
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
      var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID
   

  
  
    if(document.frmcstreg.username.value == "")
    {
      alert("Kindly enter your username.");
      document.frmcstreg.username.focus();
      return false;
    }	
    else if(!document.frmcstreg.username.value.match(alphaspaceExp))
    {
      alert("Only allow alphabets.");
      document.frmcstreg.username.focus();
      return false;
    }	
    
    else if(document.frmcstreg.bname.value == "")
    {
      alert("Kindly enter your Building Name.");
      document.frmcstreg.bname.focus();
      return false;
    }	


   else if(document.frmcstreg.bnumber.value == "")
    {
      alert("Kindly enter your building Number.");
      document.frmcstreg.bnumber.focus();
      return false;
    }	
   
   
    else if(document.frmcstreg.email.value == "")
    {
      alert("Kindly enter your email.");
      document.frmcstreg.email.focus();
      return false;
    }	
   
    else if(!document.frmcstreg.email.value.match(emailExp))
    {
      alert("Enter a valid email id.");
      document.frmcstreg.email.focus();
      return false;
    }	

    else if(document.frmcstreg.district.value == "")
    {
      alert("Kindly enter your District.");
      document.frmcstreg.district.focus();
      return false;
    }	
   
    else if(document.frmcstreg.village.value == "")
    {
      alert("Kindly enter your village.");
      document.frmcstreg.district.focus();
      return false;
    }	
    else if(document.frmcstreg.purpose.value == "")
    {
      alert("Kindly enter the purpose of supply.");
      document.frmcstreg.purpose.focus();
      return false;
    }	
    else if(document.frmcstreg.astatus.value == "")
    {
      alert("Kindly enter the status of Applicant.");
      document.frmcstreg.astatus.focus();
      return false;
    }	
    else if(document.frmcstreg.ownership.value == "")
    {
      alert("Kindly upload the ownership details.");
      document.frmcstreg.ownership.focus();
      return false;
    }	

    else if(document.frmcstreg.identity.value == "")
    {
      alert("Kindly enter the status of Applicant.");
      document.frmcstreg.identity.focus();
      return false;
    }	



     
    else
    {
      return true;
    }

  }
  
  </script> 


