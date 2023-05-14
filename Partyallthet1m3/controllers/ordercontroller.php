<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/order.php");
    require(dirname(__DIR__) . "/models/admin.php");
    require(dirname(__DIR__) . "/models/client.php");
    require(dirname(__DIR__) . "/models/balloon.php");
    require(dirname(__DIR__) . "/models/item.php");

    class OrderController {

        private $admin;
        
        function __construct() {

            if (isset($_GET)) {

                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Orders".ucfirst($action);

                    $actionClass = "\\views\\orders".$action;

                    $order = new \models\Order();
                    $client = new \models\Client();
                    $balloon = new \models\Balloon();
                    $item = new \models\Item();

                    $orders = $order->getAll();
                    $clients = $client->getAll();
                    $balloons = $balloon->getAll();
                    $items = $item->getAll();

                    $this->admin = new \models\Admin();

                    if (isset($_COOKIE)) {
                        if (isset($_COOKIE['pattadmin'])) {

                            $username = $_COOKIE['pattadmin'];

                            $this->admin = $this->admin->getUserByUsername($username)[0];
                            
                        }
                    }
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass($this->admin);

                        $view->render($orders, $clients, $balloons, $items);

                    }
                }   
            }

        }

    }

?>