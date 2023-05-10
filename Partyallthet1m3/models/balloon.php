<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Balloon
{

    private $balloon_id;
    private $name;
    private $brand;
    private $size;
    private $material;
    private $fill_type;
    private $quantity_per_bag;
    private $price_per_bag;
    private $price_per_unit;
    private $total_remaining;

    private $dbConnection;

    function __construct(...$info)
    {

        $DBConnManager = new \database\DBConnectionManager();

        $this->dbConnection = $DBConnManager->getConnection();

        if (count($info) == 9) {
            $this->name = $info[0];
            $this->brand = $info[1];
            $this->size = $info[2];
            $this->material = $info[3];
            $this->fill_type = $info[4];
            $this->quantity_per_bag = $info[5];
            $this->price_per_bag = $info[6];
            $this->price_per_unit = $info[7];
            $this->total_remaining = $info[8];
        } else if (!empty($info)) {
            $this->balloon_id = $info[0];
            $this->name = $info[1];
            $this->brand = $info[2];
            $this->size = $info[3];
            $this->material = $info[4];
            $this->fill_type = $info[5];
            $this->quantity_per_bag = $info[6];
            $this->price_per_bag = $info[7];
            $this->price_per_unit = $info[8];
            $this->total_remaining = $info[9];
        }
    }

    function getAll()
    {

        $query = "select * from balloons";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function getRow($id)
    {

        $query = "select * from balloons where balloon_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function addRow()
    {

        $query = "insert into balloons (name, brand, size, material, fill_type, quantity_per_bag,price_per_bag, price_per_unit, total_remaining) values (:name, :brand, :size, :material, :fill_type, :quantity_per_bag, :price_per_bag, :price_per_unit, :total_remaining)"; 

        $statement = $this->dbConnection->prepare($query);

        $add = $statement->execute(
            [
                'name' => $this->name,
                'brand' => $this->brand,
                'size' => $this->size,
                'material' => $this->material,
                'fill_type' => $this->fill_type,
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

        $query = "update balloons set name=:name, brand=:brand, size=:size, material=:material, fill_type=:fill_type, quantity_per_bag=:quantity_per_bag, price_per_bag=:price_per_bag, price_per_unit=:price_per_unit, total_remaining=:total_remaining where balloon_id=:balloon_id";

        $statement = $this->dbConnection->prepare($query);

        $update = $statement->execute(
            [
                'balloon_id' => $this->balloon_id,
                'name' => $this->name,
                'brand' => $this->brand,
                'size' => $this->size,
                'material' => $this->material,
                'fill_type' => $this->fill_type,
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

        $query = "delete from balloons where balloon_id=$id";

        $statement = $this->dbConnection->prepare($query);

        $delete = $statement->execute();
        
        return $delete;
    }

    function balloonLowStock()
    {

        $query = "select * from balloons where total_remaining<=5";

        $statement = $this->dbConnection->prepare($query);

        $balloonLowstock = $statement->execute();
        
        return $statement->fetchAll();
    }

    function searchBalloons($name)
    {
        $query = "select * from balloons where lower(name) like '%$name%'";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function addBalloonsToOrder($id, $currentArr)
    {

    }
}

?>