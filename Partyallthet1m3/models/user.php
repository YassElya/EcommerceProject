<?php

require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

class User {

    private $id;
    private $fname;
    private $lname;
    private $phone;
    private $email;

    private $dbConnection;

    function __construct(...$attributes){
        $conManager = new \database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
        if(!empty($attributes)){
            $this->id=$attributes[0];
            $this->fname=$attributes[1];
            $this->lname=$attributes[2];
            $this->phone=$attributes[3];
            $this->email=$attributes[4];
        }
    }

    function getAll(){
        $query = "select * from user";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }
    function getById($id){
        $query = "select * from user where id=$id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }
    function update(){
        $SQL = "UPDATE user SET fname=:fname, lname=:lname, phone=:phone, email=:email WHERE id=:id";
        $STMT = $this->dbConnection->prepare($SQL);
        $result= $STMT->execute(['id'=>$this->id,
                        'fname'=>$this->fname,
                        'lname'=>$this->lname,
                        'phone'=>$this->phone,
                        'email'=>$this->email]);
        return $result;

    }

}


?>