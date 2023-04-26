<?php namespace views;?>

<html>
  <body>

    <h1>Admin Registration</h1>
    <form action="" method="post">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password"><br><br>
      <label for="enable2fa"> Enable 2-FA?</label>
      <input type="checkbox" id="enable2fa" name="enable2fa" value="true"><br><br>
      <input type="submit" value="Register">
    </form>

    <h2> Already registered?</h2>
    <a href="http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=login">Login</a>

    <?php

      class AdminRegister{

        private $admin;

        function __construct($admin) {

          $this->admin = $admin;

          if ($this->admin->getEnabled2FA()) {

            if ($this->admin->login()) {

              $this->admin->getMembershipProvider()->login();
        
              header("location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=setuptwofa");

            }
          }
        }
      }

    ?>

  </body>
</html>