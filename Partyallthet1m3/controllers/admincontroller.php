<?php

    namespace controllers;
    require(dirname(__DIR__)."/models/admin.php");

    class AdminController {
        private $secretPin;
        private $secVerify;
        private $admin;

        function __construct(){
            $secretPin='95208';
            $secVerify= 0;
            if (isset($_GET)) {

                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    $viewClass = "\\views\\"."Admin".ucfirst($action);

                    $this->admin = new \models\Admin();

                    if (isset($_POST)) {

                        if ($action == 'login') {

                            if (isset($_POST['username']) && isset($_POST['password'])) {

                                $this->admin->setUsername($_POST['username']);

                                $this->admin = $this->admin->getUserByUsername($_POST['username'])[0];

                                $this->admin->setPassword($_POST['password']);

                                if (isset($_POST['enable2fa']))
                                    $this->admin->setEnabled2FA($_POST['enable2fa'] == 'true' ? true : false);

                                $this->admin->$action();

                            }

                        }
                        if($action == 'verify'){
                            $secVerify= 0;
                            if(isset($_POST['Verify'])){
                                if($secretPin == $_POST['SecPin']){
                                    $secVerify = 1;
                                if($secVerify == 1){
                                        header('location: index.php?resource=admin&action=register');
                                    }
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">
                                   Wrong pin inserted.
                                  </div>';
                                    $secVerify = 0;
                                }
                                
                            }
                        }                                   
                        else if ($action == 'register') {
                            if($secVerify == 0){
                                    if (isset($_POST['username']) && isset($_POST['password'])) {
                                    $this->admin->setUsername($_POST['username']);
                                    $this->admin->setPassword($_POST['password']);
                                    if (isset($_POST['enable2fa']))
                                        $this->admin->setEnabled2FA($_POST['enable2fa'] == 'true' ? true : false);

                                    $this->admin->$action();
                                    }   
                            }else if($secVerify == 1){
                                header("location: index.php?resource=admin&action=verify");
                            }
                            
                        } else if ($action == 'setuptwofa') {

                            if (isset($_COOKIE['pattadmin'])) {

                                $username = $_COOKIE['pattadmin'];
                                $this->admin = $this->admin->getUserByUsername($username)[0];

                            }

                            $this->admin->$action();

                        } else if ($action == 'validatecode') {

                            if (isset($_COOKIE['pattadmin'])) {

                                $username = $_COOKIE['pattadmin'];

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