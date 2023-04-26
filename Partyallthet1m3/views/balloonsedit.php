<?php

    namespace views;

    class BalloonsEdit {

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

            $temp_balloon = new \models\Balloon();

            $b = $temp_balloon->getRow($rowId)[0];

            if (isset($_POST['update'])) {

                $fullBalloon = new \models\Balloon($rowId, $_POST['name'], $_POST['brand'], $_POST['size'], $_POST['material'], $_POST['fill_type'], $_POST['quantity_per_bag'], $_POST['price_per_bag'], $_POST['price_per_unit'], $_POST['total_remaining']);
                $result = $fullBalloon->updateRow();
                if ($result) {
                    header('location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=balloon&action=list');
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
                                    --silver-chalice: rgba(175,175, 175, 1);
                                    --white: rgba(255,255,255,1);
                    
                                    --font-size-m: 20px;
                    
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
                                .side-bar-label {
                                    background-color: var(--black);
                                    height: 50px;
                                    width: 215px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                }
                                .side-bar-label-text {
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                }
                                #lower-button {
                                    text-align: center;
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
                                }
                            </style>
                        </head>
                    
                        <body class="body">
                            <div class="entire-screen">
                                <div class="side-bar">
                                    <div class="upper-buttons">
                                        <div class="side-bar-label">
                                            <span class="side-bar-label-text">Orders</span>
                                        </div>
                                        <div class="side-bar-label">
                                            <span class="side-bar-label-text">Inventory</span>
                                        </div>
                                        <div class="side-bar-label">
                                            <span class="side-bar-label-text">Clients</span>
                                        </div>
                                        <div class="side-bar-label">
                                            <span class="side-bar-label-text">Manage Orders</span>
                                        </div>
                                        <div class="side-bar-label">
                                            <span class="side-bar-label-text">Low Stock</span>
                                        </div>
                                        <div class="side-bar-label">
                                            <span class="side-bar-label-text">Past Orders</span>
                                        </div>
                                        <div class="side-bar-label">
                                            <span class="side-bar-label-text">Reports</span>
                                        </div>
                                    </div>
                                    <div class="side-bar-label" id="lower-button">
                                        <span class="side-bar-label-text">Log Out</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <form class="editing-section" method="post">
                                        <div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Name:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="name" name="name" value="' . $b["name"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Brand:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="brand" name="brand" value="' . $b["brand"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Size:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="size" name="size" value="' . $b["size"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Material:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="material" name="material" value="' . $b["material"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Fill Type:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="fill_type" name="fill_type" value="' . $b["fill_type"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Quantity per Bag:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="quantity_per_bag" name="quantity_per_bag" value="' . $b["quantity_per_bag"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Price per Bag:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="price_per_bag" name="price_per_bag" value="' . $b["price_per_bag"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Price per Unit:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="price_per_unit" name="price_per_unit" value="' . $b["price_per_unit"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Total Remaining:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="total_remaining" name="total_remaining" value="' . $b["total_remaining"] . '">
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