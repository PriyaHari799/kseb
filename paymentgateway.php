
<?php
session_start();
require('stripe-php-master/config.php');
?>
<!DOCTYPE html>
<html>
  <title>Payment Gateway</title>
<head>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #242d60;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto',
  'Helvetica Neue', 'Ubuntu', sans-serif;
  height: 100vh;
  margin: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
section {
  background: #ffffff;

  width: 400px;
  height: 350px;
  border-radius: 6px;
  justify-content: space-between;
  margin-right:510px;
}

p {
  font-style: normal;
 
  font-size: 14px;
  line-height: 20px;
  letter-spacing: -0.154px;
  color: #242d60;
  height: 100%;
  width: 100%;
  padding: 0 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-sizing: border-box;
}


button {
  height: 36px;
  background: #556cd6;
  color: white;
  width: 50%;
  font-size: 14px;
  border: round;
  font-weight: 500;
  position:center;
  cursor: pointer;
  letter-spacing: 0.6;
  border-radius: 0 0 6px 6px;
  transition: all 0.2s ease;
  box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
}
.cbutton
{
  height: 36px;
  background: #556cd6;
  color: white;
  width: 50%;
  font-size: 14px;
  margin-top:20px;
  border: round;
  border: 0;
  font-weight: 500;
  cursor: pointer;
  letter-spacing: 0.6;
  border-radius: 0 0 6px 6px;
  transition: all 0.2s ease;
  box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
}
button:hover {
  opacity: 1;
} 

.detailsection{
    display: block;
}
.anim{
    width:25%;
    margin: 0% 4%;
}
</style>

</head>


<?php

include("Database/connection.php");
$username=$_SESSION["username"];
 $edit=mysqli_query($con, "SELECT bill_id, `c_name`,`c_unit`, SUM(pay_amount) FROM tbl_billdetails  where c_name='$username' and status='Pending'");
 $row=mysqli_fetch_array($edit);

?>
<div class="anim" id="anim"></div>
<center>
<section><br>
<center><img src="images/4.jpg" alt="" class="img-fluid" width="20%" height="70%"></center>
<h2>QUICK PAY</h2>

      <div class="product">
        <div class="description">
           
&nbsp;&nbsp;

Payee:  <?php echo $_SESSION['username'];?><br>
          <?php
           include("Database/connection.php");
           $username=$_SESSION["username"];
           $sql = "SELECT * FROM tbl_billdetails where c_name='$username'";
           $result = mysqli_query($con, $sql);
           $rows = mysqli_num_rows($result);
           if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
               echo "
                 <tr>
             
                 ";$_SESSION['tp']=$row['pay_amount'];
                " <td scope='row'>" . $row['pay_amount'] . "</th>
                
                 
                 <td>";
             }}
          ?>
&nbsp;&nbsp;
 Amount:  ₹<?php echo $_SESSION['tp'];?></h2>
        </div>
      </div><br>  
      <form action="viewbill.php" method="POST">
      <button
            type="submit"
            value="Pay with Card"
            data-key="<?php echo $publishableKey?>"
            data-amount="<?php echo $_SESSION['tp'] * 100;?>"
            data-currency="inr"
            data-name="QUICK PAY"
            data-description="KSEB Payment System"
        >Procced to Pay</button>
  

        <script src="https://checkout.stripe.com/v2/checkout.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="js/delete.js"></script>
        <script>
        $(document).ready(function() {
            $(':submit').on('click', function(event) {
                event.preventDefault();

                var $button = $(this),
                    $form = $button.parents('form');

                var opts = $.extend({}, $button.data(), {
                    token: function(result) {
                        $form.append($('<input>').attr({ type: 'hidden', name: 'stripeToken', value: result.id })).submit();
                    }
                });

                StripeCheckout.open(opts);
            });
        });
        </script>
        <script src="./js/lottie.js"></script>
        <script src="js/app.js"></script>
</form>
    </section>
      </center>
</body>
</html>