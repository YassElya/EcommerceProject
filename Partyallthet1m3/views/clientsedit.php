<?php

    namespace views;

    class ClientsEdit {

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

            $temp_client = new \models\Client();

            $c = $temp_client->getRow($rowId)[0];

            if (isset($_POST['update'])) {

                $fullClient = new \models\Client($rowId, $_POST['fname'], $_POST['lname'], $_POST['phone_num'], $_POST['email'], $_POST['instagram']);
                $result = $fullClient->updateRow();
                if ($result) {
                    header('location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=client&action=list');
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
                                                    <span class="edit-label-text">First Name:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="fname" name="fname" value="' . $c["fname"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Last Name:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="lname" name="lname" value="' . $c["lname"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Phone Number:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="phone_num" name="phone_num" value="' . $c["phone_num"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Email:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="email" name="email" value="' . $c["email"] . '">
                                            </div>
                                            <div class="editing-row">
                                                <div class="edit-label">
                                                    <span class="edit-label-text">Instagram:</span>
                                                </div>
                                                <input class="editing-label-text" type="text" id="instagram" name="instagram" value="' . $c["instagram"] . '">
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