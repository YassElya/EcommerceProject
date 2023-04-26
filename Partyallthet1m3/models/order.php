<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Order
{

    private $order_id;
    private $status_id;
    private $client_id;
    private $total_balloons;
    private $total_items;
    private $cost;
    private $net_profit;

    private $dbConnection;

    function __construct(...$info)
    {

        $DBConnManager = new \database\DBConnectionManager();

        $this->dbConnection = $DBConnManager->getConnection();

        if (!empty($info)) {
            $this->order_id = $info[0];
            $this->status_id = $info[1];
            $this->client_id = $info[2];
            $this->total_balloons = $info[3];
            $this->total_items = $info[4];
            $this->cost = $info[5];
            $this->net_profit = $info[6];
        }
    }

    /*function getOrder() {

        $orders = $this->getAll();
        $status = $this->getStatus();
        $client = $this->getFullName();

        for ($i = 0; $i < count($orders); $i++) {
            $names = $client[$i]['fname'];
            $names .= ' ';
            $names .= $client[$i]['lname'];

            if ($i == 0) {
                $info_arr = array('order'=>$orders[$i], 'status'=>$status[$i], 'names'=>$names);
            } else {
                $info_arr .= array('order'=>$orders[$i], 'status'=>$status[$i], 'names'=>$names);
            }
        };

        //$info_arr .= $this->getStatus();
        //$info_arr .= $this->getFullName();

        return $client;

    }*/

    function getAll()
    {

        $query = "select * from orders ";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function getStatus()
    {

        $query = "select status from status";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function getFullName()
    {

        $query = "select fname, lname from clients";

        $statement = $this->dbConnection->prepare($query);
        
        $statement->execute();

        return $statement->fetchAll();
    }

    function getRow($id)
    {

        $query = "select * from orders where order_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function addRow()
    {

        $query = "insert into orders (status_id, client_id, total_balloons, total_items, cost, net_profit) values (:status_id, :client_id, :total_balloons, :total_items, :cost, :net_profit)"; 

        $statement = $this->dbConnection->prepare($query);

        $add = $statement->execute(
            [
                'status_id' => $this->status_id,
                'client_id' => $this->client_id,
                'total_balloons' => $this->total_balloons,
                'total_items' => $this->total_items,
                'cost' => $this->cost,
                'net_profit' => $this->net_profit
            ]
        );
        
        return $add;
    }

    function updateRow()
    {

        $query = "update orders set status_id=:status_id, client_id=:client_id, total_balloons=:total_balloons, total_items=:total_items, cost=:cost, net_profit=:quantity_per_bag, price_per_bag=:net_profit where order_id=:order_id";

        $statement = $this->dbConnection->prepare($query);

        $update = $statement->execute(
            [
                'order_id' => $this->order_id,
                'status_id' => $this->status_id,
                'client_id' => $this->client_id,
                'total_balloons' => $this->total_balloons,
                'total_items' => $this->total_items,
                'cost' => $this->cost,
                'net_profit' => $this->net_profit
            ]
        );
        
        return $update;
    }

    function deleteRow($id)
    {

        $query = "delete from orders where order_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $delete = $statement->execute();
        
        return $delete;
    }
}

?>