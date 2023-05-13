<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/order.php");
    require(dirname(__DIR__) . "/models/client.php");
    require(dirname(__DIR__) . "/models/balloon.php");
    require(dirname(__DIR__) . "/models/item.php");

    class OrderController {
        
        function __construct() {

            if (isset($_GET)) {

                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Orders".ucfirst($action);

                    $order = new \models\Order();
                    $client = new \models\Client();
                    $balloon = new \models\Balloon();
                    $item = new \models\Item();

                    $orders = $order->getAll();
                    $clients = $client->getAll();
                    $balloons = $balloon->getAll();
                    $items = $item->getAll();

                    $actionClass = "\\views\\orders".$action;
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass();

                        $view->render($orders, $clients, $balloons, $items);

                    }
                }   
            }

        }

    }

?>