<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/balloon.php");

    class BalloonController {
        
        function __construct() {

            if (isset($_GET)) {
                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $actionClass = "\\views\\balloons".$action;
                    
                    if (class_exists($actionClass)) {}
                }   
            }

        }

    }

?>