<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/balloon.php");
    require(dirname(__DIR__) . "/models/item.php");
    require(dirname(__DIR__) . "/models/admin.php");

    class LowstockController {

        private $admin;
        
        function __construct() {

            if (isset($_GET)) {

                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."LowStock".ucfirst($action);

                    $actionClass = "\\views\\lowstock".$action;

                    $balloon = new \models\Balloon();

                    $balloons = $balloon->balloonLowStock();

                    $item = new \models\Item();

                    $items = $item->itemLowStock();

                    $this->admin = new \models\Admin();

                    if (isset($_COOKIE)) {
                        if (isset($_COOKIE['pattadmin'])) {

                            $username = $_COOKIE['pattadmin'];

                            $this->admin = $this->admin->getUserByUsername($username)[0];
                            
                        }
                    }
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass($this->admin);

                        $view->render($balloons, $items);

                    }
                }   
            }
        }
    }

?>