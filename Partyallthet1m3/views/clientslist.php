<?php

    namespace views;

    class ClientsList {

        private $admin;            

        public function __construct($admin) {

            $this->admin = $admin;

            $membershipProvider = $this->admin->getMembershipProvider();

            if (!($membershipProvider->isLoggedIn())) {

                header('HTTP/1.1 401 Unauthorized');
                header('location: http://localhost/EcommerceProject/Partyallthet1m3/index.php?resource=admin&action=login');

            }

        }

        function render(...$data) {

            $clients = $data[0];

            if (isset($_POST['update'])) {
                if($_POST['updateid']!=''){
                    header('location: index.php?resource=client&action=edit&resourceid='. $_POST['updateid'] .'');
                }
            } else if (isset($_POST['delete'])) {
                if($_POST['deleteid']!=''){
                    header('location: index.php?resource=client&action=delete&resourceid='. $_POST['deleteid'] .'');
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
                                                <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=order&action=add\')">New Order</button>
                                                <button class="side-bar-label-subtitle" onClick="location.assign(\'index.php?resource=balloon&action=list\')">Delete Order</button>
                                                <button class="side-bar-label-solo" onClick="location.assign(\'index.php?resource=lowstock&action=list\')">Low Stock</button>
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
                                            <div class="content-buttons">
                                                <div class="add-button">
                                                    <button class="completed-text" onClick="location.assign(\'index.php?resource=client&action=add\')">Add</button>
                                                </div>
                                                <div class="modify-button">
                                                    <form method="post">
                                                        <input class="modify-button-text" type="text" name="updateid" value="">
                                                        <button class="completed-text" type="submit" name="update">Update Row</button>
                                                    </form>
                                                </div>
                                                <div class="modify-button">
                                                    <form method="post">
                                                        <input class="modify-button-text" type="text" name="deleteid" value="">
                                                        <button class="completed-text" type="submit" name="delete">Delete Row</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <button class="completed-text" onClick="location.assign(\'index.php?resource=client&action=search\')">Search</button>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <tr class="heading">
                                                    <th>Client ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th>Instagram</th>
                                                </tr>';

            foreach ($clients as $c) {

                $html .= '<tr>
                            <td>' . $c['client_id'] . '</td>
                            <td>' . $c['fname'] . '</td>
                            <td>' . $c['lname'] . '</td>
                            <td>' . $c['phone_num'] . '</td>
                            <td>' . $c['email'] . '</td>
                            <td>' . $c['instagram'] . '</td>
                        </tr>';
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