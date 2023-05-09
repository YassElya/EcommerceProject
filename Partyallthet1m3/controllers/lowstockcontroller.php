<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/balloon.php");
    require(dirname(__DIR__) . "/models/item.php");

    class LowstockController {
        
        function __construct() {

            if (isset($_GET)) {
                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."LowStock".ucfirst($action);

                    $balloon = new \models\Balloon();

                    $balloons = $balloon->balloonLowStock();

                    $item = new \models\Item();

                    $items = $item->itemLowStock();

                    $actionClass = "\\views\\lowstock".$action;
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass();

                        $view->render($balloons, $items);

                    }
                }   
            }
        }
    }

?>