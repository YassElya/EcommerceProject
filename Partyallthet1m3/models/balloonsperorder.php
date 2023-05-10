<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Status
{

    private $balloon_id;
    private $order_id;
    private $num_of_balloons;

    private $dbConnection;

    function __construct(...$info)
    {

        $DBConnManager = new \database\DBConnectionManager();

        $this->dbConnection = $DBConnManager->getConnection();

        if (!empty($info)) {
            $this->balloon_id = $info[0];
            $this->order_id = $info[1];
            $this->num_of_balloons = $info[2];
        }
    }

    function getAll()
    {

        $query = "select * from balloons_per_order";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function addRow()
    {

        $query = "insert into balloons_per_order (balloon_id, order_id, num_of_balloons) values (:balloon_id, :order_id, :num_of_balloons)"; 

        $statement = $this->dbConnection->prepare($query);

        $add = $statement->execute(
            [
                'balloon_id' => $this->balloon_id,
                'order_id' => $this->order_id,
                'num_of_balloons' => $this->num_of_balloons
            ]
        );
        
        return $add;
    }

    function deleteRow($balloon_id, $order_id)
    {

        $query = "delete from balloons_per_order where balloon_id=$balloon_id and order_id=$order_id";

        $statement = $this->dbConnection->prepare($query);

        $delete = $statement->execute();
        
        return $delete;
    }
}

?>