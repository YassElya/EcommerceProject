<?php

    namespace models;
    require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");
    require(dirname(__DIR__)."/core/membershipprovider.php");

    class Admin {

        private $id;
        private $username;
        private $password;
        private $enabled2fa = false;
        private $otpsecretkey;
        private $otpcodeisvalid;
        private $dbConnection;
        private $membershipProvider;
        private $secretpin = '12345';
        private $userpin;

        function __construct() {

            $conManager = new \database\DBConnectionManager();

            $this->dbConnection = $conManager->getConnection();

            $this->membershipProvider = new \membershipprovider\MembershipProvider($this);

        }

        function register() {

            $query = "INSERT INTO admin (username, password, enabled2fa) VALUES(:username, :password, :enabled2fa)";

            $statement = $this->dbConnection->prepare($query);

            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

            return $statement->execute(['username' => $this->username, 'password'=> $hashedPassword, 'enabled2fa'=> $this->enabled2fa]);

        }
        
        function verify() {

            $verified = false;

            $hash = password_hash($this->secretpin, PASSWORD_DEFAULT);

                if (password_verify($this->userpin, $hash))
                    $verified = true;

            return $verified;
        }

        function login() {

            $verified = false;

            $dbPassword = $this->getPasswordByUsername();

            if (password_verify($this->password, $dbPassword))
                $verified = true;

            return $verified;

        }

        function logout() {

            $this->membershipProvider->logout();

        }

        function isLoggedIn() {

            $this->membershipProvider->isLoggedIn();

        }

        function getPasswordByUsername() {

            $query = "SELECT password FROM admin WHERE username = :username";

            $statement = $this->dbConnection->prepare($query);

            $statement->execute(['username'=> $this->username]);

            return $statement->fetchColumn(0);

        }

        function getUserByUsername($username) {

            $query = "SELECT * FROM admin WHERE username = :username";

            $statement = $this->dbConnection->prepare($query);

            $statement->execute(['username'=> $username]);

            return $statement->fetchAll(\PDO::FETCH_CLASS, Admin::class);

        }

        public function setuptwofa() {

            $this->otpsecretkey = $this->membershipProvider->generateSecretKey();

            $this->saveotpSecretKey();

        }

        private function saveotpSecretKey() {

            $query = "UPDATE admin SET otpsecretkey = :otpsecretkey WHERE id = :id";

            $statement = $this->dbConnection->prepare($query);

            $statement->execute(['otpsecretkey'=> $this->otpsecretkey, 'id' => $this->id]);

        }

        public function validatecode($twofacode) {

            $this->otpcodeisvalid = $this->membershipProvider->verifyCode($this->otpsecretkey, $twofacode);

        }

        public function setUsername($username) {

            $this->username = $username;

        }
    
        public function getUsername() {

            return $this->username;

        }

        public function getPassword() {

            return $this->password;

        }

        public function setPassword($password) {

            $this->password = $password;

        }

        public function getMembershipProvider() {

            return $this->membershipProvider;

        }

        public function setEnabled2FA($enabled2fa) {

            $this->enabled2fa = $enabled2fa;

        }

        public function getEnabled2FA() {

            return $this->enabled2fa;

        }

        public function getOTPsecretkey() {

            return $this->otpsecretkey;

        }

        public function getOTPcodeisvalid() {
            
            return $this->otpcodeisvalid;
            
        }

        public function getSecretPin() {

            return $this->secretpin;

        }

        public function setSecretPin($secretpin) {

            $this->secretpin = $secretpin;

        }
        
        public function getUserPin() {

            return $this->userpin;

        }

        public function setUserPin($userpin) {

            $this->userpin = $userpin;

        }
    }

?>