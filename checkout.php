
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


$username=$_SESSION["username"];
 $edit=mysqli_query($con, "SELECT bill_id, `c_name`,`c_unit`, SUM(pay_amount) FROM tbl_billdetails  where c_name='$username' and status='Pending'");
 $row=mysqli_fetch_array($edit);

?>
<?php

 if (isset($_POST["submit"]))
 {
 $u=$_POST["name"];
   $e=$_POST["unit"];
 
     $h=$_POST["amt"];
 
     $cont="INSERT INTO `bill` (`name`,`amount`,`unit`,`date`) VALUES('$u','$h','$e',curdate())";
         $res=mysqli_query($con,$cont);
         header('location:successful.php');
        
 }
 ?>







<html>
    <head>
    <link rel="stylesheet" href="stylesheet/style3.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <style>

body {

  background-color:#cce0ff;
}




.amex {
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAeCAMAAABdem3zAAAAA3NCSVQICAjb4U/gAAACi1BMVEUAAAAAAAAAdKIAdqcGdqoDeqkDeKoDe6sFeqoFeqwCeqoGe6wGeasGeqwGe6wFeqwFeqwFeqsGe6oFeawEeqwEeqwFe6wHeaoFe6oFeasFe6wFeawHe6wIfKwJfKwKfa0Lfa0Mfq0Of64Pf64QgK8RgK8Sga8TgbAUgrAVgrAWg7EXg7EYhLEZhLIahbIbhbIdhrMfh7QgiLQhiLQjirUkirUli7YnjLYojLcqjbcsj7gtj7kukLkvkLkwkbkxkboykrozkro0k7s1k7s2lLs3lLw4lbw5lbw6lr07lr08l709l75Amb9Bmr9Dm8BFnMBHncFIncFJnsJKnsJLn8JMn8NNoMNOocRPocRQosRRosVUpMZVpMZWpcZXpcdYpsdZp8dap8dbqMheqclgqslhq8pjrMpkrMtnrsxpr8xqr81tsc5vss5wss9xs89ztNB0tdB1ttF6uNJ8udN9utN+utR/u9SAu9SBvNWCvNWDvdWEvdWGvtaHv9aIv9eKwNeMwdiPw9mQw9mRxNqTxdqUxtuVx9uWx9yXyNyYyNyZyd2ayd2byt2cyt6dy96fzN+gzN+hzd+izeCjzuCkzuCn0OGp0eKq0eKr0uOs0+Ot0+Ov1OSw1eSy1uWz1uW01+W32Oa62ui72+i82+i+3Om/3enC3urE3+vF4OvH4ezI4uzJ4u3K4+3L4+3N5O7O5e7P5e/R5u/S5/DT5/DV6PHW6fHX6fHY6vHa6/Lb7PPc7PPd7fPe7fTf7vTg7vTi7/Xj8PXk8fbm8vbn8vfo8/fp8/fq9Pjr9Pjs9fjt9fnu9vnv9vnw9/rx9/ry+Prz+Pv0+fv1+fv2+vz4+/z5+/37/P38/f7+/v7///+B6xdgAAAAHHRSTlMAARYaJ0FIT1pcYG6YmZyssrPDys3T2tvt9PX+1nJQbwAAAnFJREFUOMtjYOAWESMWiAqwMzBwyZAEOBn4SdMgzCBImgYJUjVI0UeDkoGBrq6BgZ6MhgECqAA56nJ6ICZIWN3AQAeuoevIrvOHDuy6ZLl1366ru3ft2nVl167dJ08cOXHo/P6Dl3Yd33Nm15mdJw+thGnQO2ei2nzDRaZp405Zmd2KxhYWW2TMTeUmJOWv0NOPKVJ1uNEi4329LByuoXKaabvZNZcQw8u5IUANrYuX7pA5eNSxJCk/OPfGBe2ZKotbnAw6kTSs8Axslpnh0mtRr74YqME7LGaHjI6G4uakfOfGG21q3c5hLf7TNDMQGhqUMjN9vFz6O2TCjgA11M+Zs13m4oXIvKT8bOs+i7DMNJks/xuhcggNKQ3b+vfGpS65kLTqVNyRpLi4uP1xl6d09jRPPF+blHC29WB+SsX5PXF1cA0lE/1lWiZOnFg2saZrIgxkgojiyr6JZTLxQFZ5ycSJpRTHdOAmMMiM2Agk103esGnTxiWzwELTVwOJyes29aFqiFtrCQR+x05FuVpaWqcfA3I8FlQDyandjpaWh5KtLI3RNCxTA8ZypHewb7vNrvWKk2QW7wiIzU3YteusXtXWrQvllm+diK5BRl6+4JyW2omJ2qkRiqtknN2VF+UCxWbmKCi5b3GU1fRE16B+4cK5RCe3pH6z6bP3nZOZsyYoMzftwsWrp4+skZt/4kA1mqfjVqgAgcORw/Z23kejg86r7JxXm1AIFOqzVdFLAEoahaNqiDgMBplZQGKNjC6QbD0MA3vmAomN5XTLcaQASQZe0jSIM3CQpoGPgZFHmgT1QkwMDAzMrOxEAjYWBgYAvI9h1MHdhQIAAAAASUVORK5CYII=") #fff;
}

.visa {
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAeCAMAAABdem3zAAAAA3NCSVQICAjb4U/gAAABvFBMVEUAAADQ0NDa2tra2trZ2dnY2Nja2trt7e3t7e0mM3onNHspNXkqN30rN30sOH4tN3ovO4AwPIAyPoE1QYM3Q4Q4Q4U4RIU5RYY8R4g9SIhCTYtDToxGUY5HUo5JU49JVJBOWJJQW5RSXJVTXZZVX5dXYZhYYplaY5pfaJ1kbaBlbqFoaZFocaNpcqNqc6RtdqZvd6dzcpV0fKp2f6x5ga18g698hK99hK99hbB+hrCAh7GDi7OHjrWIj7aJkLeNk7mNlLqOlbqRl7yUmr6WnL6YnsCbocKepMSjqMekqceprsqrsMysscytss2uss2xts+xttC0uNG1udK1utK2utK3u9O6vdS7v9W8wNa9wda9wdfBxNnDx9rEx9vFyNzFydvHy93Kzd/Mz+DR0+LS1OPT1uTVnV/V1+XX2ebY2NjZuJbZ2+faoVza3Ojc3+rf4evf4ezi5O7j5e7n6fHp6/Lq6/Lr7PPsmC3snTfs7fPunjnu7/Tu7/Xw8fbx8vfy8/f09fj09fn19vn29/r3z5332LH39/r42LD42bL42bP5+fv76tX77dz7+/v7+/387dv9/f7+9ev//v3///9+dhG/AAAACXRSTlMAGxuq7e7u+vsOT6YMAAABbklEQVQ4y+WUV1cTYRQAlwSIsxoLltgLKgZ7AwV777FiL9gT1x4FGxpb0Gg0On/YBx83D+wz8z7nu+fe800QpNKtpTHSmk4FQUt7pu4YqWfaW4L0BBOQSQdt9SRCvS0omYjSOBZ+fB0d/f5T/VQoDHi6cF4b1/Zt6d9fUZ+cLFyMvfDny6vhN3/1EOwegW4/LAHgpb6bBpNr8ZE2PBz+rQvIvrgJ2+2DdaeOba7pXoBbceHAxHvfHIRNHoHjLobLqlZnkIeDcaHIlAeuh6Jb4bb9EG58rh6G4nTWNNnSHFYNZcnrcsKK1d4Qpl63MY9lrmRmE6GHcCdc0Q7mqt5ZAfM9C7uKvfA0LlyASSzUt7Daz+pIyGw7+c+JuPAxCxzV+7DHrq5tOzqhbxA6crlcSE+TS+dhVk0vwRk7AFhb64a76lIWva7EhKEoKqvvo6jqs6sD526UNYoeq5ajR78a4/k/JM5M4pAlTGUqSBrjf5znrWNE0ZcCAAAAAElFTkSuQmCC") #fff;
}

.mastercard {
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAeCAMAAABdem3zAAAAA3NCSVQICAjb4U/gAAACc1BMVEUAAADQ0NDa2tra2trZ2dnY2Nja2trt7e3t7e3MAADMAQHMBATNCQnOCwvODAzODg7PDwnPERHRGxvSFgfSHh7SHx/SIB7THhDTJCTTJibTJyfUKSnVIAXVLS3VMDDWMjLWNTXWNjbXIQDXLyLXNS7XNzfXOzvYLxbYPT3YPj7Y2NjZOy/ZRUXaSEjaSUnbLQDbLgDbS0vbTU3cSj/cU1PdNADdSjTdVVXdVlbeNwDeW1vfYmLgUDPgZWXgZmbgaGjhXkvhamrhbW3ia2Lib2/jXDfja1njdXXkeHjkeXnke3vlgIDlgYHmg4PmhITmhobnh4fniIjni4voVgDojIzokJDqXADqaiTqlpbqmJjqmZnqmprrnJzrn5/tpqbuqqrura3urq7vsbHvsrLvs7PwbADwbQDwtLTwtbXwt7fxvLzycgDyjULyvr7yv7/zdQDzmVvzn2fzxMTzxcXzx8f2fwD21tb3gQD3x6/3ybL32Nj4hAD43t7439/44OD5iQD54eH54uL65ub65+f76+v7+/v88vL89PT99/f9+Pj9+fn+lwD+/f3/mQD/mgT/nQv/nw//oRT/oRX/oRb/ohj/qCf/qSn/qSr/qy3/rDH/rjX/rjb/sT7/sj//s0L/tEX/tUf/tUj/tkn/t0v/uVD/uVH/u1X/vFj/vVr/vl7/v2H/w2n/xGz/x3P/yHb/yXr/zob/z4j/0Iv/1Zj/1pr/153/2J7/26X/3q7/4LL/4LP/4bX/4bb/5cD/5sL/58P/58T/58X/6sz/7NH/7dL/8d7/8t//9OX/9eb/9ef/9ur/9+v/+vT/+/X//Pj//fz///90HdR0AAAACXRSTlMAGxuq7e7u+vsOT6YMAAABmElEQVQ4y2NgYGJm0SISsDAzMTAwsrG3XiAStLKzMTIwc1wgAbAzM7C2kqKhlZVB6wJJQItSDS3R5orSmo7pPUD2+d2r506bvWzLKdwaOr14OSFAMuXCzqm9ENC//hwODc2KnHDAVdCLALNOYNXQLo9QzylgGoykY+YZbBqckNSrpKamdSPpWINFQw03kgZhJSUlSyQNfUcxNfjzyfFISUDUi5WCQO+EOZOgGmZswNSgY3VBpyPOxJZf1d4uWdxZW9k45+SBtStWTVowffH8o/MxNUgHNsY0entmxrW5R6VnhNb6NlVu6p247uCOs3sOH941DYuG9MTa3JCiGp+S+CzdrrziBOuK5b1L9x8/tG3vko0bsWjQafCKaIhNqon0qyvzqApyKZMtPLZl8/bTR1Zv3Xd6JRYnBeiJChkJGqppWIgoKKi7mTnIVC9YPHnhnHlTJiyaM3EDgWANz87OLicQrCgRx6VvYJBPIOJQk4ZNWD3BpIGS+DhdCSc+0pM3JAOpkpCBaJOnSS5mSC7ISCwqgYUriYUxAINRRW57ksG5AAAAAElFTkSuQmCC") #fff;
}

.discover {
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAeCAMAAABdem3zAAAAA3NCSVQICAjb4U/gAAACLlBMVEUAAADQ0NDa2tra2trZ2dnY2Nja2trt7e3t7e3vzbDvzbEBAQECAgIDAwMTExMUFBQWFhYYGBgZGRkeHh4jIyMmJiYnJycpKSksLCwtLS0uLi4wMDAzMzM0NDQ3Nzc6Ojo8PDw/Pz9CQkJDQ0NHR0dJSUlKSkpMTExOTk5PT09RUVFWVlZYWFhcXFxgYGBiYmJjY2Nra2tsbGxtbW1wcHBxcXF0dHR1dXV2dnZ3d3d4eHh8fHx9fX1+fn6AgICBgYGCgoKDg4OLi4uMjIyPj4+VlZWWlpabm5udnZ2enp6fn5+hoaGjo6OoqKirq6usrKyvr6+wsLCysrKzs7O4uLi7u7u8vLy9vb2/v7/AwMDBwcHExMTGxsbHx8fJycnLy8vQ0NDR0dHS0tLU1NTW1tbY2NjZ2dnb29vd3d3f39/h4eHi4uLn5+fo6Ojp6enr6+vs7Ozt7e3v7+/x8fHy8vL1giD1giH1gyP1hCT1iS31ii71izD1jDL2kTv2kjz2kz/2lED2lkP2lkT2l0X2mUn2pmH2pmL3m033n1X3oVf3pF73pV739/f4q2n4q2r4rWz4r3D4r3H4sXT4s3f5uoT5u4b5vov5+fn6xJb6yJ36yqD6zKT6+vr7zqj70a372Ln7+/v83sT838b84Mj84sv848785M/85dD89O78/Pz959X96Nb969z9/f3+8+r+9e7+9u/+9/H++PP++vb++vf+/Pn+/Pr+/fz+/v7////OeAUcAAAAC3RSTlMAGxuq7e7u+vv7+w/+RoMAAAGnSURBVDjLY2BgYmZJJRKwMDMxMDCysS/YSSRYwM7GyMDMsZMEwM7MwLqAFA0LWBlSd5IEUumkwc7A0HPBTuvcTAN13535FuqWJTsXdrdP2+IZuHOnR6iNgYHVDgMDsySEBin3QE2NnWJpKk6x8T1iDsku6UvKSktL+4Kld84RzBb3Co9ZyRPnJYikIXHnAr5ssTR9hYCVIfIg8UmlILBCOMFfa6e4jWvQWh5/e0kUDTuFMsTSpvvI6gUog8QngzVsdDRVC9spbu7st5bbmL8ASUNEipEi0ElRRQEyhYL+K/2Tl5cD1U/cmSMgsXOneHRe3krenSpuCA26ckp2xTu1s2xFZSJ3JqiJqKbvXNrbOWPrzp0m3jt36sjJyS2Q35ms0rNz53wSg3VRI2kaVlc1kKRhVU0pSRoWVZaSpGF2RSkpGjZNAMcM0RoW15aSomE9JOKJ1bB1VnUpCRq2z6srLSVew+ZZyMoJalgzpbq0lGgNG+Z2lGKAplQcxcy6uV3lpVhAKyuWgmzLwqktpTgAJzNaUblt2cz+xnocoLmNiw1YuJJYGAMAEKBGzN/0FVAAAAAASUVORK5CYII=") #fff;
}

.expiry-date-group {
  float: left;
  width: 50%
}

.expiry-date-group input {
  width: calc(100% + 1px);
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.expiry-date-group input:focus {
  position: relative;
  z-index: 10;
}

.security-code-group {
  float: right;
  width: 50%
}

.security-code-group input {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.zip-code-group {
  clear: both;
}

#PayButton {
  outline: 0!important;
  height: 42px;
  font-size: 16px;
  background-color: #54C7C3!important;
  border: none;
}


.container {
  margin-top: 50px;
}

#Checkout {
  z-index: 100001;
  background: ;
  width: 50%;
  min-width: 300px;
  height: 70%;
  min-height: 30%;
  background: 0 0 #ffffff;
  border-radius: 8px;
  border: 1px solid #dedede;
  margin-left: auto;
  margin-right: auto;
  display: block;
}

#Checkout>h1 {
  margin: 0;
  padding: 20px;
  text-align: center;
  background: #EEF2F4;
  color: #5D6F78;
  font-size: 24px;
  font-weight: 300;
  border-bottom: 1px solid #DEDEDE;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
}

#Checkout>form {
  margin: 0 25px 25px;
}

label {
  color: #46545C;
  margin-bottom: 2px;
}

.input-container {
  position: relative;
}

.input-container input {
  padding-right: 25px;
}

.input-container>i, a[role="button"] {
  color: #d3d3d3;
  width: 25px;
  height: 30px;
  line-height: 30px;
  font-size: 16px;
  position: absolute;
  top: 2px;
  right: 2px;
  cursor: pointer;
  text-align: center;
}

.card-row {
  text-align: center;
  margin: 20px 25px 10px;
}

.card-row span {
  width: 48px;
  height: 30px;
  margin-right: 3px;
  background-repeat: no-repeat;
  display: inline-block;
  background-size: contain;
}

.card-image {
  background-repeat: no-repeat;
  padding-right: 50px;
  background-position: right 2px center;
  background-size: auto 90%
}

.cvc-preview-container {
  overflow: hidden;
}

.cvc-preview-container.two-card div {
  width: 48%;
  height: 80px;
}

.cvc-preview-container.two-card div.amex-cvc-preview {
  float: right;
}

.cvc-preview-container.two-card div.visa-mc-dis-cvc-preview {
  float: left;
}

.cvc-preview-container div {
  height: 160px;
}


.align-middle {
  vertical-align: middle;
}

input {
  box-shadow: none!important;
}

input:focus {
  border-color: #b0e5e3!important;
  background-color: #EEF9F9!important;
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


<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<div class="container">
  <div id="Checkout" class="inline">
      <h1>Check Out</h1>
      <div class="card-row">
          <span class="visa"></span>
          <span class="mastercard"></span>
          <span class="amex"></span>
          <span class="discover"></span>
      </div>
      <form action='#' method='POST'>
          <div class="form-group">
              
          </div>
          <div class="form-group">
              <label or="NameOnCard">Name</label>
              <input id="NameOnCard" name="name" class="form-control" value="<?php echo $row['c_name']?>" type="text" maxlength="255" readonly></input>
          </div>

          <div class="form-group">
              <label or="NameOnCard">Unit</label>
              <input id="NameOnCard" name="unit" class="form-control" value="<?php echo $row['c_unit']?>" type="text" maxlength="255" readonly></input>
          </div>

          <div class="form-group">
              <label for="CreditCardNumber">Amount</label>
              <input  type="text" d="NameOnCard" name="amt" class="form-control"  value="<?php  echo $row['SUM(pay_amount)']?>" type="text" readonly></input>
          </div>
          
         
          <button type="submit" id="submit" name="submit" class="btn btn-block btn-success submit-button" onclick="pay_now()" data-toggle="modal" data-target="#myModal">Check Out</button>

              <span class="submit-button-lock"></span>
            
          </button>
      </form>
  </div>
</div>
</body>
<!--<script>

 function pay_now(){
     var name=jQuery('#name').val();
     var amt=jQuery('#amt').val();

    var options = {
        "key": "rzp_test_SXMtNa1Zxd5krT", 
        "amount": 5000, 
        "currency": "INR",
        "name": "Acme Corp",
        "description": "Test Transaction",
        "image": "https://example.com/your_logo",
    
        "handler": function (response){
        jQuery.ajax({
          type:'post',
          url:'payment_process.php',
          data:"payment_id="+response.razorpay_payment_id+"&amt="+amt+"&name="+name,
          success:function(result){
            window.location.href="thankyou.php";

          }


            
        });
     }
    };
    var rzp1 = new Razorpay(options);
        rzp1.open();
     

 }


</script>-->




<?php
      }
?>