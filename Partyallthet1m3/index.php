<?php

    //http://localhost/Partyallthet1m3/index.php?resource=client&action=list (full CRUD operations)
    //http://localhost/Partyallthet1m3/index.php?resource=balloon&action=list (another example of a view)
    //http://localhost/Partyallthet1m3/index.php?resource=order&action=list
    //http://localhost/Partyallthet1m3/index.php?resource=admin&action=login

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