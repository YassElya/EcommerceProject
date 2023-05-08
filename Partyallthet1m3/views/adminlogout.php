<?php

    namespace views;

    class AdminLogout{

        private $admin;

        function __construct($admin) {

            $this->admin = $admin;
            $this->admin->getMembershipProvider()->logout();
            header('Location: index.php?resource=admin&action=login');
            
        }
    }

?>