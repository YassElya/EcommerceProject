<?php

    //http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=client&action=list
    //http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=balloon&action=list
    //http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=order&action=list
    //http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=login

    spl_autoload_register(
        
        function ($class) {
            require($class.".php");

        }

    );

    class App {
        
        function __construct() {

            if (isset($_GET)) {
                if (isset($_GET['resource'])) {

                    $resource = $_GET['resource'];

                    $controllerClass = "\\controllers\\".ucfirst($resource)."Controller";
                    
                    if (class_exists($controllerClass)) {
                        $controller = new $controllerClass();
                    }
                }   
            }
        }
    }

    // Test
    $app = new App();

?>