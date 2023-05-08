<?php

    namespace views;

    class BalloonsDelete {

        function render(...$data) {

            $rowId = 0;
            if (isset($_GET)) {
                if (isset($_GET['resourceid'])) {
                    $rowId = $_GET['resourceid'];
                    $rowId = (int)$rowId;
                }
            }

            $fullBalloon = new \models\Balloon();

            $result = $fullBalloon->deleteRow($rowId);
            if ($result) {
                header('location: index.php?resource=balloon&action=list');
            } else {
                echo "Error!";
            }

        }

    }

?>