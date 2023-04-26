<?php

    namespace database;

    class DBConnectionManager {

        private $username;
        private $password;
        private $server;
        private $dbname;

        private $dbConnection;

        function __construct() {

            $this->username = "root";
            $this->password = "";
            $this->server = "localhost";
            $this->dbname = "project_db";

            try {

                $this->dbConnection = new \PDO("mysql:host=$this->server;dbname=$this->dbname",
                $this->username, $this->password);

            } catch(\PDOException $e) {

                echo "Connection failed: " . $e->getMessage();

            }

        }

        function getConnection() {

            return $this->dbConnection;

        }

    }

?>