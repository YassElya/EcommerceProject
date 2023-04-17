<?php

require(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Balloon
{

    private $id;
    private $color;
    private $size;
    private $shape;

    private $dbConnection;

    function __construct(...$info)
    {

        $DBConnManager = new DBConnectionManager();

        $this->dbConnection = $DBConnManager->getConnection();

        if (!empty($info)) {
            $this->id = $info[0];
            $this->color = $info[1];
            $this->size = $info[2];
            $this->shape = $info[3];
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

        $query = "select * from balloons where id=$id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    function updateRow()
    {

        $query = "update balloons set color=:color, size=:size, shape=:shape where id=:id";

        $statement = $this->dbConnection->prepare($query);

        $update = $statement->execute(
            [
                'id' => $this->id,
                'color' => $this->color,
                'size' => $this->size,
                'shape' => $this->shape
            ]
        );
        
        return $update;
    }
}

?>