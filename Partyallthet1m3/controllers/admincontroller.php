<?php

    namespace controllers;
    require(dirname(__DIR__)."/models/admin.php");

    class AdminController {

        private $admin;

        function __construct(){

            if (isset($_GET)) {

                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Admin".ucfirst($action);

                    $this->admin = new \models\Admin();

                    if (isset($_POST)) {

                        if ($action == 'login') {

                            if (isset($_POST['username']) && isset($_POST['password']) ) {

                                $this->admin->setUsername($_POST['username']);

                                $this->admin = $this->admin->getUserByUsername($_POST['username'])[0];

                                $this->admin->setPassword($_POST['password']);

                                if (isset($_POST['enable2fa']))
                                    $this->admin->setEnabled2FA($_POST['enable2fa'] == 'true' ? true : false);

                                $this->admin->$action();
                            }

                        } else if ($action == 'register') {

                            if (isset($_POST['username']) && isset($_POST['password'])) {

                                    $this->admin->setUsername($_POST['username']);
                                    $this->admin->setPassword($_POST['password']);

                                    if (isset($_POST['enable2fa'])){
                                        $this->admin->setEnabled2FA($_POST['enable2fa'] == 'true' ? true : false);
                                    }

                                    $this->admin->$action();

                            }

                        } else if ($action == 'setuptwofa') {

                            if (isset($_COOKIE['hrappuser'])) {

                                $username = $_COOKIE['hrappuser'];
                                $this->admin = $this->admin->getUserByUsername($username)[0];

                            }

                            $this->admin->$action();

                        } else if ($action == 'validatecode') {

                            if (isset($_COOKIE['hrappuser'])) {

                                $username = $_COOKIE['hrappuser'];

                                $this->admin = $this->admin->getUserByUsername($username)[0];

                            }

                            if (isset($_POST['twofacode'])) {

                                $twofacode = $_POST['twofacode'];

                                $this->admin->$action($twofacode);

                            }
                        }
                    }

                    if (class_exists($viewClass)) {

                        $view = new $viewClass($this->admin);

                    }
                }
            }
        }
    }

?>