<?php

    namespace views;

    class OrdersList {

        /*private $admin;

        public function __construct($admin) {

            $this->admin = $admin;

            $membershipProvider = $this->admin->getMembershipProvider();

            if (!($membershipProvider->isLoggedIn())) {

                header('HTTP/1.1 401 Unauthorized');
                header('location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=login');

            }

        }*/

        function render(...$data) {

            $orders = $data[0];

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
                                    <table class="table">
                                        <tr class="heading">
                                            <th>Order ID</th>
                                            <th>Status ID</th>
                                            <th>Client ID</th>
                                            <th>Total Balloons</th>
                                            <th>Total Items</th>
                                            <th>Cost</th>
                                            <th>Net Profit</th>
                                        </tr>';

            $counter = 1;
            foreach ($orders as $o) {

                $html .= '<tr>
                            <td>' . $o['order_id'] . '</td>
                            <td>' . $o['status_id'] . '</td>
                            <td>' . $o['client_id'] . '</td>
                            <td>' . $o['total_balloons'] . '</td>
                            <td>' . $o['total_items'] . '</td>
                            <td>' . $o['cost'] . '</td>
                            <td>' . $o['net_profit'] . '</td>
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