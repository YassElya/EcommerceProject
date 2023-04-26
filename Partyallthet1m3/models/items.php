<?php
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class items{
    private $item_id;
    private $item_type;
    private $amount;
    private $price;

    private $dbConnection;

    function __construct(){
        $DBConnManager = new \database\DBConnectionManager();
        $this->dbConnection = $DBConnManager->getConnection(); 
    }

    function storeItem($item_type,$amount,$price){
        $SQL = "INSERT INTO items (item_type, amount, price) VALUES ($item_type, $amount, $price)";
        $STMT = $this->dbConnection->prepare($SQL);
        $result= $STMT->execute(['id'=>$this->item_id,
                                 'item_type'=>$this->item_type,
                                 'amount'=>$this->amount,
                                 'price'=>$this->price]);
        return $result;

    }
}







?>