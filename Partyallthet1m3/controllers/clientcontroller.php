<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/client.php");

    class ClientController {
        
        function __construct() {

            if (isset($_GET)) {
                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Clients".ucfirst($action);

                    $client = new \models\Client();

                    $clients = $client->getAll();

                    $actionClass = "\\views\\clients".$action;
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass();

                        $view->render($clients);

                    }
                }   
            }
        }
    }

?>