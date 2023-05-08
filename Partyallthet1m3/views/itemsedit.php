<?php

    namespace views;

    class ItemsEdit {

        /*private $user;
        private $welcomeMessage;             

        public function __construct($user) {

            $this->user = $user;

            echo var_dump($this->user);

            $membershipProvider = $this->user->getMembershipProvider();

            if ($membershipProvider->isLoggedIn()) {

                $this->welcomeMessage = 'Welcome ' . $this->user->getUsername() . '!'; 

            } else {

                header('HTTP/1.1 401 Unauthorized');
                header('location: http://localhost/myApp/index.php?resource=user&action=login');

            }

        }*/

        function render(...$data) {

            $rowId = 0;
            if (isset($_GET)) {
                if (isset($_GET['resourceid'])) {
                    $rowId = $_GET['resourceid'];
                    $rowId = (int)$rowId;
                }
            }

            $temp_item = new \models\Item();

            $i = $temp_item->getRow($rowId)[0];

            if (isset($_POST['update'])) {

                $fullItem = new \models\Item($rowId, $_POST['name'], $_POST['brand'], $_POST['size'], $_POST['quantity_per_bag'], $_POST['price_per_bag'], $_POST['price_per_unit'], $_POST['total_remaining']);
                $result = $fullItem->updateRow();
                if ($result) {
                    header('location: index.php?resource=item&action=list');
                } else {
                    echo "Error!";
                }
            }

            $html = '<html>
                        <head>
                            <style>
                                :root {
                                    --black: rgba(0,2,0,1);
                                    --granite-gray: rgba(104, 104, 104, 1);
                                    --granite-gray2: rgba(64, 64, 64, 1);
                                    --silver-chalice: rgba(175,175, 175, 1);
                                    --white: rgba(255,255,255,1);
                    
                                    --font-size-m: 20px;
                                    --font-size-s: 16px;
                    
                                    --font-family-inter: "Inter";
                                }
                                .body {
                                    background-color: var(--silver-chalice);
                                    margin: 0;
                                    overflow: hidden;
                                }
                                .entire-screen {
                                    display: flex;
                                    height: 100%;
                                }
                                .side-bar {
                                    background-color: var(--silver-chalice);
                                    width: 250px;
                                    padding: 2px;
                                    overflow: hidden;
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: space-between;
                                }
                                .side-bar-label-text {
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                    padding-top: 25px;
                                    padding-bottom: 25px;
                                }
                                .side-bar-label-solo {
                                    background-color: var(--black);
                                    width: 225px;
                                    border-radius: 15px;
                                    margin: 12px 12px 0px 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                    text-align: left;
                                    border-style: none;
                                    cursor: pointer;
                                }
                                .side-bar-label-title {
                                    background-color: var(--black);
                                    height: 50px;
                                    width: 215px;
                                    border-radius: 15px;
                                    margin: 12px 12px 0px 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    cursor: default;
                                }
                                .side-bar-label-subtitle {
                                    background-color: var(--granite-gray2);
                                    width: 180px;
                                    border-radius: 15px;
                                    margin: 6px 12px 0px 55px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 40px;
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-s);
                                    font-weight: 600;
                                    font-style: normal;
                                    text-align: left;
                                    border-style: none;
                                    cursor: pointer;
                                }
                                .side-bar-label-bottom {
                                    background-color: var(--black);
                                    height: 50px;
                                    width: 225px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                    padding-bottom: 25px;
                                    border-style: none;
                                    text-align: center;
                                    cursor: pointer;
                                }
                                .content {
                                    background-color: var(--black);
                                    margin: 10px;
                                    flex: 1;
                                    overflow: auto;
                                }
                                .editing-section {
                                    height: 100%;
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: space-between;
                                }
                                .editing-row {
                                    display: flex;
                                }
                                .edit-label, .completed {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 215px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    cursor: default;
                                }
                                .edit-label-text {
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                }
                                .editing-label {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 215px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                }
                                .editing-label-text {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 430px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                }
                                .completed-text {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 215px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                    border-style: none;
                                    cursor: pointer;
                                }
                            </style>
                        </head>
                    
                        <body class="body">
                            <div class="entire-screen">
                                <div class="side-bar">
                                    <div>
                                        <button class="side-bar-label-solo" onClick="location.assign(\'index.php?resource=order&action=list\')">Orders</button>
                                        <div class="side-bar-label-title">
                                            <span class="side-bar-label-text">Inventory:</span>
                                        </div>
                                        <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=balloon&action=list\')">Balloons</button>
                                        <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=item&action=list\')">Items</button>
                                        <button class="side-bar-label-solo" onClick="location.assign(\'index.php?resource=client&action=list\')">Clients</button>
                                        <div class="side-bar-label-title">
                                            <span class="side-bar-label-text">Manage Orders:</span>
                                        </div>
                                        <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=balloon&action=list\')">New Order</button>
                                        <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=balloon&action=list\')">Delete Order</button>
                                        <button class="side-bar-label-solo" onClick="location.assign(\'index.php?resource=order&action=list\')">Low Stock</button>
                                        <div class="side-bar-label-title">
                                            <span class="side-bar-label-text">Past Orders:</span>
                                        </div>
                                        <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=balloon&action=list\')">All Past Orders</button>
                                        <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=balloon&action=list\')">Favorite Past Order</button>
                                        <div class="side-bar-label-title">
                                            <span class="side-bar-label-text">Reports:</span>
                                        </div>
                                        <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=balloon&action=list\')">Current Report</button>
                                        <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=balloon&action=list\')">Past Reports</button>
                                    </div>
                                    <button class="side-bar-label-bottom" id="lower-button" onClick="location.assign(\'index.php?resource=admin&action=logout\')">Log Out</button>
                                </div>
                                <div class="content">
                                    <form class="editing-section" method="post">
                                        <div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Name:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="name" name="name" value="' . $i["name"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Brand:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="brand" name="brand" value="' . $i["brand"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Size:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="size" name="size" value="' . $i["size"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Quantity per Bag:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="quantity_per_bag" name="quantity_per_bag" value="' . $i["quantity_per_bag"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Price per Bag:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="price_per_bag" name="price_per_bag" value="' . $i["price_per_bag"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Price per Unit:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="price_per_unit" name="price_per_unit" value="' . $i["price_per_unit"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Total Remaining:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="total_remaining" name="total_remaining" value="' . $i["total_remaining"] . '">
                                            </div>
                                        </div>
                                        <div>
                                            <input class="completed-text" type="submit" name="update" value="Change Values">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </body>
                    </html>';

        echo $html;

        }
    }

?>