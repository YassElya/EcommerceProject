<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Client
{

    private $client_id;
    private $fname;
    private $lname;
    private $phone_num;
    private $email;
    private $instagram;

    private $dbConnection;

    function __construct(...$info)
    {

        $DBConnManager = new \database\DBConnectionManager();

        $this->dbConnection = $DBConnManager->getConnection();

        if (count($info) == 5) {
            $this->fname = $info[0];
            $this->lname = $info[1];
            $this->phone_num = $info[2];
            $this->email = $info[3];
            $this->instagram = $info[4];
        } else if (!empty($info)) {
            $this->client_id = $info[0];
            $this->fname = $info[1];
            $this->lname = $info[2];
            $this->phone_num = $info[3];
            $this->email = $info[4];
            $this->instagram = $info[5];
        }
    }

    function getAll()
    {

        $query = "select * from clients";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function getRow($id)
    {

        $query = "select * from clients where client_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function addRow()
    {

        $query = "insert into clients (fname, lname, phone_num, email, instagram) values (:fname, :lname, :phone_num, :email, :instagram)"; 

        $statement = $this->dbConnection->prepare($query);

        $add = $statement->execute(
            [
                'fname' => $this->fname,
                'lname' => $this->lname,
                'phone_num' => $this->phone_num,
                'email' => $this->email,
                'instagram' => $this->instagram
            ]
        );
        
        return $add;
    }

    function updateRow()
    {

        $query = "update clients set fname=:fname, lname=:lname, phone_num=:phone_num, email=:email, instagram=:instagram where client_id=:client_id";

        $statement = $this->dbConnection->prepare($query);

        $update = $statement->execute(
            [
                'client_id' => $this->client_id,
                'fname' => $this->fname,
                'lname' => $this->lname,
                'phone_num' => $this->phone_num,
                'email' => $this->email,
                'instagram' => $this->instagram
            ]
        );
        
        return $update;
    }

    function deleteRow($id)
    {

        $query = "delete from clients where client_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $delete = $statement->execute();
        
        return $delete;
    }

    function searchClients($name)
    {
        $query = "select * from clients where lower(fname) like '%$name%'";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function getFName() {
        return $this->fname;
    }

    function getLName() {
        return $this->lname;
    }
}

?>