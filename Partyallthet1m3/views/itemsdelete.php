<?php

    namespace views;

    class ItemsDelete {

        function render(...$data) {

            $rowId = 0;
            if (isset($_GET)) {
                if (isset($_GET['resourceid'])) {
                    $rowId = $_GET['resourceid'];
                    $rowId = (int)$rowId;
                }
            }

            $fullItem = new \models\Item();

            $result = $fullItem->deleteRow($rowId);
            if ($result) {
                header('location: index.php?resource=item&action=list');
            } else {
                echo "Error!";
            }

        }

    }

?>