<?php
    
    namespace controllers;
    require(dirname(__DIR__) . "/models/order.php");
    require(dirname(__DIR__) . "/models/balloon.php");
    require(dirname(__DIR__) . "/models/item.php");
    require(dirname(__DIR__) . "/models/client.php");

    class OrderController {
        
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

                    if (isset($_POST)) {

                        if ($action == 'newclient') {

                            if (isset($_POST['newclient'])) {

                                $clients = $_POST['newclient'];

                                echo $clients;
                                
                            }

                        } else if ($action == 'oldclient') {

                            if (isset($_POST['oldclient'])) {

                                $clients = $_POST['oldclient'];

                            }
                            
                        } else if ($action == 'balloons') {

                            if (isset($_POST['addballoon'])) {

                                $balloons = $_POST['addballoon'];

                            }

                        } else if ($action == 'items') {

                            if (isset($_POST['additem'])) {

                                $items = $_POST['additem'];

                            }

                        }/* else if ($action == 'price') {

                            if (isset($_POST['price'])) {

                                $items = $_POST['price'];

                            }

                        } else if ($action == 'summary') {

                            if (isset($_COOKIE['pattadmin'])) {

                                $username = $_COOKIE['pattadmin'];

                                $this->admin = $this->admin->getUserByUsername($username)[0];

                            }

                            if (isset($_POST['twofacode'])) {

                                $twofacode = $_POST['twofacode'];

                                $this->admin->$action($twofacode);

                            }

                        } else if ($action == 'complete') {

                            if (isset($_COOKIE['pattadmin'])) {

                                $username = $_COOKIE['pattadmin'];

                                $this->admin = $this->admin->getUserByUsername($username)[0];

                            }

                            if (isset($_POST['twofacode'])) {

                                $twofacode = $_POST['twofacode'];

                                $this->admin->$action($twofacode);

                            }*/
                        }
                    }
                    
                    if (class_exists($actionClass)) {

                        $view = new $viewClass();

                        $view->render($orders, $client, $balloons, $items);

                    }
                }   
            }

        }

    //}

?>