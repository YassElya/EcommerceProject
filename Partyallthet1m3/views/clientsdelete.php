<?php

    namespace views;

    class ClientsDelete {

        function render(...$data) {

            $rowId = 0;
            if (isset($_GET)) {
                if (isset($_GET['resourceid'])) {
                    $rowId = $_GET['resourceid'];
                    $rowId = (int)$rowId;
                }
            }

            $fullClient = new \models\Client();

            $result = $fullClient->deleteRow($rowId);
            if ($result) {
                header('location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=client&action=list');
            } else {
                echo "Error!";
            }

        }

    }

?>