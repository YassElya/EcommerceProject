<?php namespace views;?>

<html>
    <body>
        <h1>Enter your 2FA OTP Code</h1>
        <form action="" method="post">
            <label for="twofacode">Code:</label><br>
            <input type="text" id="twofacode" name="twofacode"><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

<?php

    class AdminValidatecode {

        private $admin;

        function __construct($admin){

            $this->admin = $admin;

            if (isset($_POST['twofacode'])) {

                if ($this->admin->getOTPcodeisvalid())
                    header('Location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=order&action=list');
                else
                    echo 'Invalid 2FA code, please try again.';
            }
        }
    }

?>