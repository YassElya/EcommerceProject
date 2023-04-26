<?php

    namespace views;

    class AdminSetupTwofa {

        private $admin;

        function __construct($admin) {
            
            $this->admin = $admin;

            $this->render();

        }

        function render() {

            $qrcodeimageURL= \TokenAuth6238::getBarCodeUrl($this->admin->getUsername(), 'localhost', $this->admin->getOTPsecretkey(), 'EcommerceProject-main');

            echo 'Download the authenticator app:';
            echo '</br>';
            echo 'Either the Google authenticator app';
            echo '</br>';
            echo 'https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en_CA&gl=US&pli=1';
            echo '</br>';
            echo 'or the Microsoft Authenticator app';
            echo '</br>';
            echo 'https://apps.apple.com/us/app/microsoft-authenticator/id983156458';
            echo '</br>';
            
            $html = '<img src="'.$qrcodeimageURL.'"alt="QR Code" />';
            
            echo $html;

            echo '</br>';
            echo '<a href="http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=login">Continue</a>';

        }
    }



?>