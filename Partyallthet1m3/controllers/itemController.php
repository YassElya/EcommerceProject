<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/item.php");

    class ItemController {
        
        function __construct() {

            if (isset($_GET)) {
                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Items".ucfirst($action);

                    $item = new \models\Item();

                    $items = $item->getAll();

                    $actionClass = "\\views\\items".$action;
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass();

                        $view->render($items);

                    }
                }   
            }
        }
    }

?>