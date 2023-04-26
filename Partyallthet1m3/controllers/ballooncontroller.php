<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/balloon.php");

    class BalloonController {
        
        function __construct() {

            if (isset($_GET)) {
                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Balloons".ucfirst($action);

                    $balloon = new \models\Balloon();

                    $balloons = $balloon->getAll();

                    $actionClass = "\\views\\balloons".$action;
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass();

                        $view->render($balloons);

                    }
                }   
            }
        }
    }

?>