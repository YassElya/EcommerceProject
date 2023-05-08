<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Item
{

    private $item_id;
    private $name;
    private $brand;
    private $size;
    private $quantity_per_bag;
    private $price_per_bag;
    private $price_per_unit;
    private $total_remaining;

    private $dbConnection;

    function __construct(...$info)
    {

        $DBConnManager = new \database\DBConnectionManager();

        $this->dbConnection = $DBConnManager->getConnection(); 

        if (count($info) == 7) {
            $this->name = $info[0];
            $this->brand = $info[1];
            $this->size = $info[2];
            $this->quantity_per_bag = $info[3];
            $this->price_per_bag = $info[4];
            $this->price_per_unit = $info[5];
            $this->total_remaining = $info[6];
        } else if (!empty($info)) {
            $this->item_id = $info[0];
            $this->name = $info[1];
            $this->brand = $info[2];
            $this->size = $info[3];
            $this->quantity_per_bag = $info[4];
            $this->price_per_bag = $info[5];
            $this->price_per_unit = $info[6];
            $this->total_remaining = $info[7];
        }
    }

    function getAll()
    {

        $query = "select * from items";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function getRow($id)
    {

        $query = "select * from items where item_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function addRow()
    {

        $query = "insert into items (name, brand, size, quantity_per_bag, price_per_bag, price_per_unit, total_remaining) values (:name, :brand, :size, :quantity_per_bag, :price_per_bag, :price_per_unit, :total_remaining)"; 

        $statement = $this->dbConnection->prepare($query);

        $add = $statement->execute(
            [
                'name' => $this->name,
                'brand' => $this->brand,
                'size' => $this->size,
                'quantity_per_bag' => $this->quantity_per_bag,
                'price_per_bag' => $this->price_per_bag,
                'price_per_unit' => $this->price_per_unit,
                'total_remaining' => $this->total_remaining
            ]
        );
        
        return $add;
    }

    function updateRow()
    {

        $query = "update items set name=:name, brand=:brand, size=:size, quantity_per_bag=:quantity_per_bag, price_per_bag=:price_per_bag, price_per_unit=:price_per_unit, total_remaining=:total_remaining where item_id=:item_id";

        $statement = $this->dbConnection->prepare($query);

        $update = $statement->execute(
            [
                'item_id' => $this->item_id,
                'name' => $this->name,
                'brand' => $this->brand,
                'size' => $this->size,
                'quantity_per_bag' => $this->quantity_per_bag,
                'price_per_bag' => $this->price_per_bag,
                'price_per_unit' => $this->price_per_unit,
                'total_remaining' => $this->total_remaining
            ]
        );
        
        return $update;
    }

    function deleteRow($id)
    {

        $query = "delete from items where item_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $delete = $statement->execute();
        
        return $delete;
    }
}

?>