<?php

    namespace views;

    class LowstockList {

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
            $items = $data[1];

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
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: space-between;
                                }
                                .content-buttons {
                                    display: flex;
                                    justify-content: space-between;
                                }
                                .table-div {
                                    flex: 1;
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
                                        <button class="side-bar-label-subtitle" onClick="">New Order</button>
                                        <button class="side-bar-label-subtitle" onClick="">Delete Order</button>
                                        <button class="side-bar-label-solo" onClick="location.assign(\'index.php?resource=lowstock&action=list\')">Low Stock</button>
                                        <div class="side-bar-label-title">
                                            <span class="side-bar-label-text">Past Orders:</span>
                                        </div>
                                        <button class="side-bar-label-subtitle" onClick="">All Past Orders</button>
                                        <button class="side-bar-label-subtitle" onClick="">Favorite Past Order</button>
                                        <div class="side-bar-label-title">
                                            <span class="side-bar-label-text">Reports:</span>
                                        </div>
                                        <button class="side-bar-label-subtitle" onClick="">Current Report</button>
                                        <button class="side-bar-label-subtitle" onClick="">Past Reports</button>
                                    </div>
                                    <button class="side-bar-label-bottom" id="lower-button" onClick="location.assign(\'index.php?resource=admin&action=logout\')">Log Out</button>
                                </div>
                                <div class="content">
                                    <div class="table-div">
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
            }

            $html .= '</table>
                        </div>
                        <div class="table-div">
                        <table class="table">
                            <tr class="heading">
                                <th>Item ID</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Size</th>
                                <th>Quantity per Bag</th>
                                <th>Price per Bag</th>
                                <th>Price per Unit</th>
                                <th>Total Left</th>
                            </tr>';

            foreach ($items as $i) {

                $html .= '<tr>
                            <td>' . $i['item_id'] . '</td>
                            <td>' . $i['name'] . '</td>
                            <td>' . $i['brand'] . '</td>
                            <td>' . $i['size'] . '</td>
                            <td>' . $i['quantity_per_bag'] . '</td>
                            <td>' . $i['price_per_bag'] . '</td>
                            <td>' . $i['price_per_unit'] . '</td>
                            <td>' . $i['total_remaining'] . '</td>
                        </tr>';

            }

            $html .= '</table>
                    </div>
                    </div>
                    </div>
                    </body>
                    </html>';

            echo $html;
        }
    }

?>