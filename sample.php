<?php
 session_start();
      include("Database/connection.php");
if (isset($_SESSION["id"]) != session_id()) {

  echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='userlogin.php';
      </script>");
} else {
?>
  <div class="mt-5">
  <div class="card mx-auto text-center" style="width: 18rem;">
    
    <div class="card-body">
      <?php
    
      include("Database/connection.php");
      $uid = $_SESSION["id"];
      $username =$_SESSION["username"];
      $sql="SELECT * FROM tbl_usereg WHERE login_id=(SELECT login_id FROM tbl_login where username='$username')";
      $result = mysqli_query($con, $sql);
      $rows = mysqli_num_rows($result);
      if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
         
          echo "<p class=card-text>" . $row['name'] . "</p>";
          echo "<p class=card-text>" . $row['email'] . "</p>";
          echo "<p class=card-text>" . $row['consnumber'] . "</p>";
          echo "<p class=card-text>" . $row['phone'] . "</p>";
          echo "<p class=card-text>" . $row['username'] . "</p>";

      

        }
      }
      ?>

    </div>
  </div>
  </div>
  </body>
  </html>

  <?php
}
?>