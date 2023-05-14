<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/item.php");
    require(dirname(__DIR__) . "/models/admin.php");

    class ItemController {

        private $admin;
        
        function __construct() {

            if (isset($_GET)) {

                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Items".ucfirst($action);

                    $actionClass = "\\views\\items".$action;

                    $item = new \models\Item();

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

                        $view->render($items);

                    }
                }   
            }
        }
    }

?>