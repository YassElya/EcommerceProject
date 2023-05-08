<?php

    namespace views;

    class BalloonsList {

        /*private $admin;            

        public function __construct($admin) {

            $this->admin = $admin;

            $membershipProvider = $this->admin->getMembershipProvider();

            if (!($membershipProvider->isLoggedIn())) {

                header('HTTP/1.1 401 Unauthorized');
                header('location: http://localhost/Partyallthet1m3/index.php?resource=admin&action=login');

            }

        }*/

        function render(...$data) {

            $balloons = $data[0];

            if (isset($_POST['update'])) {
                header('location: index.php?resource=balloon&action=edit&resourceid='. $_POST['updateid'] .'');
            } else if (isset($_POST['delete'])) {
                header('location: index.php?resource=balloon&action=delete&resourceid='. $_POST['deleteid'] .'');
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
                                    cursor: default;
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
                                .side-bar-labels-top {
                                    background-color: var(--black);
                                    height: 50px;
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
                                #lower-button {
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
                                    display: flex;
                                    flex-direction: column;
                                }
                                .content-buttons {
                                    display: flex;
                                    justify-content: space-between;
                                }
                                .button {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 215px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    text-align: center;
                                    vertical-align: middle;
                                    line-height: 50px;
                                }
                                .buttons-text {
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                    padding-top: 25px;
                                    padding-bottom: 25px;
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
                                .modify-button-text {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 75px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    text-align: center;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                    cursor: text;
                                }
                                .table {
                                    background-color: var(--white);
                                    width: 100%;
                                    border: 5px solid var(--black);
                                    table-layout: fixed;
                                    border-collapse: collapse;
                                    cursor: default;
                                }
                                table th, td {
                                    border-left: 2px solid var(--black);
                                }
                                table td:first-child {
                                    border-left: none;
                                }
                                .heading {
                                    background-color: #454545;
                                    height: 75px;
                                    font-size: var(--font-size-m);
                                }
                                th {
                                    color: white;
                                    text-align: center;
                                    border-bottom: 2px solid var(--black);
                                }
                                td {
                                    padding: 5px;
                                    text-align: left;
                                }
                                tr:nth-child(even) {
                                    background-color: #e0e0e0;
                                }
                            </style>
                        </head>
                    
                        <body class="body">
                            <div class="entire-screen">
                                <div class="side-bar">
                                    <div class="upper-buttons">
                                        <button class="side-bar-labels-top" onClick="location.assign(\'index.php?resource=order&action=list\')">Orders</button>
                                        <button class="side-bar-labels-top" onClick="location.assign(\'index.php?resource=balloon&action=list\')">Inventory</button>
                                        <button class="side-bar-labels-top" onClick="location.assign(\'index.php?resource=client&action=list\')">Clients</button>
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
                                    <button class="side-bar-labels" id="lower-button" onClick="location.assign(\'index.php?resource=admin&action=logout\')">Log Out</button>
                                </div>
                                <div class="content">
                                    <div class="content-buttons">
                                        <div class="add-button">
                                            <button class="completed-text" onClick="location.assign(\'index.php?resource=balloon&action=add\')">Add</button>
                                        </div>
                                        <div>
                                            <form method="post">
                                                <input class="modify-button-text" type="text" name="updateid" value="">
                                                <button class="completed-text" type="submit" name="update">Update Row</button>
                                            </form>
                                        </div>
                                        <div>
                                            <form method="post">
                                                <input class="modify-button-text" type="text" name="deleteid" value="">
                                                <button class="completed-text" type="submit" name="delete">Delete Row</button>
                                            </form>
                                        </div>
                                        <div class="button">
                                            <span class="buttons-text">Search</span>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <tr class="heading">
                                            <th>Balloon ID</th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Size</th>
                                            <th>Material</th>
                                            <th>Fill Type</th>
                                            <th>Quantity per Bag</th>
                                            <th>Price per Bag</th>
                                            <th>Price per Unit</th>
                                            <th>Total Left</th>
                                        </tr>';

            $counter = 1;
            foreach ($balloons as $b) {

                $html .= '<tr>
                            <td>' . $b['balloon_id'] . '</td>
                            <td>' . $b['name'] . '</td>
                            <td>' . $b['brand'] . '</td>
                            <td>' . $b['size'] . '</td>
                            <td>' . $b['material'] . '</td>
                            <td>' . $b['fill_type'] . '</td>
                            <td>' . $b['quantity_per_bag'] . '</td>
                            <td>' . $b['price_per_bag'] . '</td>
                            <td>' . $b['price_per_unit'] . '</td>
                            <td>' . $b['total_remaining'] . '</td>
                        </tr>';

                $counter++;
            }

            $html .= '</table>
                        </div>
                        </div>
                        </body>
                        </html>';

            echo $html;
        }
    }

?>