<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/items.php");

    class ItemsController {
        
        function __construct() {

            if (isset($_GET)) {
                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $actionClass = "\\views\\items".$action;
                    
                    if (class_exists($actionClass)) {}
                }   
            }

        }

        function userInputItem(){
            if(isset($_POST)){
                if(isset($_POST['submit'])){
                    $this->item_type = $_POST['type'];
                    $this->amount = $_POST['amount'];
                    $this->price = $_POST['price'];
                    $item = new items();
                    $item->storeItem($this->item_type,$this->amount,$this->price);
                }else{
                    echo "Data inserting failed.";
                }
            }
        }

    }

?>