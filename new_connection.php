
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
			  $amt="INSERT INTO `newconnect` (`username`, `bname`, `bnumber`, `email`, `district`, `village`, `date`, `purpose`, `appstatus`) VALUE('$username','$bname','$bnumber','$email','$district','$village',curdate(),'$purpose','$a_status')";
				$res=mysqli_query($con,$amt);
					if($res)
	{
			header('location:consuccess.php');
	}
		  }
					}
				}
 
?>






<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin:50px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
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
                        <a href="index.html"><button type="button" class="btn btn-primary btn-arrow-left"><i class='fas fa-angle-double-left'></i>BACK TO HOME</button></a>
                            </li>&nbsp;&nbsp;

                            
                        
                        </ul>
                    </div>
                </div>
            </nav>


</head>
<body>

<form id="regForm" action="#" method="post" onSubmit="return validatecstreg()" name="frmcstreg">
  <center>  <h2>New Connection</h2></center>
  <h6>Complete this forms</h6><bR>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Name of Applicant:
    <p><input type="text" placeholder="Name of Applicant" oninput="this.className = ''" name="username"></p>
    <p>Name of Building:</p>
    <p><input placeholder="Name of Building" oninput="this.className = ''" name="bname"></p>
    <p>Building Number:</p>
    <p><input type="text" placeholder="Building Number" oninput="this.className = ''" name="bnumber"></p>

  </div>
  <div class="tab">E-mail:
    <p><input type="text" placeholder="E-mail" oninput="this.className = ''" name="email"></p>
    <p>District:</p>
    <p><select class="form-control" id="district" name="district" id="exampleFormControlSelect1" onchange="populate(this.id,'village')">
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
</p>
    <p>Village:</p>
    <select class="form-control" id="village" name="village" id="exampleFormControlSelect1">
      
    </select>
  </div>
 
  <div class="tab">purpose:
    <p><input type="text" placeholder="Purpose" oninput="this.className = ''" name="purpose"></p>



    <p>Status of Applicant:</p>
    <p><input type="text" placeholder="Purpose of Applicant" oninput="this.className = ''" name="astatus" ></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


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

  var optionArray=['changanacherry|Changanacherry','kangazha|Kangazha','karukachal|Karukachal','kurichy|Kurichy','kanjirappally|Kanjirappally'
  ,'koovappally|Koovappally','koruthodu|Koruthodu','manimala|Manimala','mundakayam|Mundakayam','akalakunnam|Akalakunnam','nattakom|Nattakom'];

}


else if(s1.value=='Idukki')

{

  var optionArray=['pallivasal|Pallivasal','pampadumpara|Pampadumpara','vattavada|Vattavada','vellathuval|Vellathuval','santhanpara|Santhanpara'
  ,'alacode|Alacode','elappara|Elappara','peruvanthanam|Peruvanthanam','vagamon|Vagamon','muttom|Muttom'];

}


else if(s1.value=='Ernakulam')

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



     
    else
    {
      return true;
    }

  }
  
 








</script>

</body>
</html>
