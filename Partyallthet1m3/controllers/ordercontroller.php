<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/order.php");

    class OrderController {
        
        function __construct() {

            if (isset($_GET)) {
                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Orders".ucfirst($action);

                    $order = new \models\Order();

                    $orders = $order->getAll();

                    $actionClass = "\\views\\orders".$action;
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass();

                        $view->render($orders);

                    }
                }   
            }

        }

    }

?>