<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/balloon.php");
    require(dirname(__DIR__) . "/models/admin.php");

    class BalloonController {

        private $admin;
        
        function __construct() {

            if (isset($_GET)) {

                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Balloons".ucfirst($action);

                    $actionClass = "\\views\\balloons".$action;

                    $balloon = new \models\Balloon();

                    $balloons = $balloon->getAll();

                    $this->admin = new \models\Admin();

                    if (isset($_COOKIE)) {
                        if (isset($_COOKIE['pattadmin'])) {

                            $username = $_COOKIE['pattadmin'];

                            $this->admin = $this->admin->getUserByUsername($username)[0];
                            
                        }
                    }
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass($this->admin);

                        $view->render($balloons);

                    }
                }   
            }
        }
    }

?>