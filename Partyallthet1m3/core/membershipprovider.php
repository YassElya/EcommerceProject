<?php

    namespace membershipprovider;

    require(dirname(__DIR__)."/vendor/phpotp/code/rfc6238.php");

    class MembershipProvider{

        private $admin;

        function __construct($admin){

            $this->admin = $admin;

        }

        function login() {

            session_name("patt");

            session_start();

            $_SESSION['username'] = $this->admin->getUsername();

            setcookie('pattadmin', $this->admin->getUsername(), time()+3600);

        }

        function isLoggedIn() {

            session_name("patt");

            session_start();
            
            $isLoggedIn = false;

            if (isset($_SESSION)) {

                if (isset($_SESSION['username'])) {

                    if ($_SESSION['username'] == $this->admin->getUsername()) {

                        $isLoggedIn = true;

                    }
                }
            }

            return $isLoggedIn;
        }

        function logout() {

            session_destroy();

            setcookie('pattadmin', $this->admin->getUsername(), time()-3600);

        }

        function generateSecretKey() {

            $otpsecretKey = \TokenAuth6238::generateRandomClue();

            return $otpsecretKey;

        }

        function getCodeforKey($otpsecretkey) {

            $otpcode =  \TokenAuth6238::getTokenCode($otpsecretkey);

            return $otpcode;

        }

        function verifyCode($otpsecretKey, $otpcode) {

            return  \TokenAuth6238::verify($otpsecretKey, $otpcode);

        }

    }

?>