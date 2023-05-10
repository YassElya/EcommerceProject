<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Status
{

    private $item_id;
    private $order_id;
    private $num_of_items;

    private $dbConnection;

    function __construct(...$info)
    {

        $DBConnManager = new \database\DBConnectionManager();

        $this->dbConnection = $DBConnManager->getConnection();

        if (!empty($info)) {
            $this->item_id = $info[0];
            $this->order_id = $info[1];
            $this->num_of_items = $info[2];
        }
    }

    function getAll()
    {

        $query = "select * from items_per_order";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function addRow()
    {

        $query = "insert into items_per_order (item_id, order_id, num_of_items) values (:item_id, :order_id, :num_of_items)"; 

        $statement = $this->dbConnection->prepare($query);

        $add = $statement->execute(
            [
                'item_id' => $this->item_id,
                'order_id' => $this->order_id,
                'num_of_items' => $this->num_of_items
            ]
        );
        
        return $add;
    }

    function deleteRow($balloon_id, $order_id)
    {

        $query = "delete from items_per_order where balloon_id=$balloon_id and order_id=$order_id";

        $statement = $this->dbConnection->prepare($query);

        $delete = $statement->execute();
        
        return $delete;
    }
}

?>