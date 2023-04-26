<?php namespace views;?>

<html>
  <body>

    <h1>Admin Login Page</h1>
    <form action="" method="post">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="Login">
    </form>

    <h2>Not registered?</h2>
    <a href="http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=register">Register</a>

    <?php

      class AdminLogin {

        private $admin;
        private $userMessage;

        function __construct($admin) {

          $this->admin = $admin;

          if ($this->admin->login()) {

            $this->admin->getMembershipProvider()->login();

            if ($this->admin->getEnabled2FA())
              header('Location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=validatecode');
            else
              header('Location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=order&action=list');

          } else {

            $this->userMessage = 'You were not able to login, check your username and passowrd and try again.';
            $this->render();

          }

        }

        function render() {

          if (($this->admin->getUsername() !== null) && ($this->admin->getPassword() !== null))
            echo $this->userMessage;

        }
      }

    ?>

  </body>
</html>