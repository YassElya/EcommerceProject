<?php
namespace controllers;

require(dirname(__DIR__)."/models/user.php");
class UserController{

    function __construct(){
        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                $viewClass = "\\views\\"."user".$action;
                if(class_exists($viewClass)){


                }
            }
        }
    }
}

?>