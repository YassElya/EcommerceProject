<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Status
{

    private $status_id;
    private $status;
    private $gross_profit;

    private $dbConnection;

    function __construct(...$info)
    {

        $DBConnManager = new \database\DBConnectionManager();

        $this->dbConnection = $DBConnManager->getConnection();

        if (!empty($info)) {
            $this->status_id = $info[0];
            $this->status = $info[1];
            $this->gross_profit = $info[2];
        }
    }

    function getAll()
    {

        $query = "select * from status";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function getRow($id)
    {

        $query = "select * from status where status_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function addRow()
    {

        $query = "insert into status (status, gross_profit) values (:status, :gross_profit)"; 

        $statement = $this->dbConnection->prepare($query);

        $add = $statement->execute(
            [
                'fname' => $this->status,
                'lname' => $this->gross_profit
            ]
        );
        
        return $add;
    }

    function updateRow()
    {

        $query = "update status set status=:status, gross_profit=:gross_profit where status_id=:statust_id";

        $statement = $this->dbConnection->prepare($query);

        $update = $statement->execute(
            [
                'client_id' => $this->status_id,
                'fname' => $this->status,
                'lname' => $this->gross_profit
            ]
        );
        
        return $update;
    }

    function deleteRow($id)
    {

        $query = "delete from status where status_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $delete = $statement->execute();
        
        return $delete;
    }
}

?>