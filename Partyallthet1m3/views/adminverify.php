<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin verify page</title>
    </head>

    <body>
        <h1>Are you really an admin?</h1>
        <label><strong>Enter the Secret Pin to go to the Register Page:</strong></label><br>
        
        <form action="" method="post">
            <input type="password" name="adminpw"><br><br>
            <input type="submit" name="verify" value="Verify"><br>
        </form>
    </body>
</html>

<?php
    class AdminVerify {

        private $admin;

        function __construct ($admin) {

            $this->admin = $admin;

            var_dump($this->admin);

            if ($this->admin->verify()) {

                echo 'Verified Successfully';
                header('location: localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=register');

            } else {
                echo 'Incorrect Pin';
            }
        }
    }

?>