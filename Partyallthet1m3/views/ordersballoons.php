<?php
    
    namespace views;

    class OrdersBalloons {

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

            $balloons = $data[2];

            $balloonsToAdd = array();

            var_dump($_SESSION);

            if (isset($_POST['add'])) {

                if (isset($_POST['add-balloon-number']) && isset($_POST['add-balloon-row'])) {

                    $balloonAmount = $_POST['add-balloon-number'];
                    $balloonID = $_POST['add-balloon-row'];

                    $fullBalloon = new \models\Balloon();
                    $result = $fullBalloon->getRow($balloonID);
                    
                    if ($result) {

                        $balloonsToAdd[] = array($result, $balloonAmount);

                        if (isset($_SESSION)) {

                            if (isset($_SESSION['balloonsInOrder'])) {

                                $currentOrder = $_SESSION['balloonsInOrder'];
    
                                array_push($currentOrder, $balloonsToAdd[0]);
                                $_SESSION['balloonsInOrder'] = $currentOrder;
    
                            } else {
    
                                $_SESSION['balloonsInOrder'] = $balloonsToAdd[0];
    
                            }

                        }

                    }

                }

            }

            if (isset($_POST['refresh-order'])) {

                $_SESSION['balloonsInOrder'] = array();

            }

            if (isset($_POST['search'])) {

                $fullBalloon = new \models\Balloon();
                $balloons = $fullBalloon->searchBalloons($_POST['searched']);

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
                                    justify-content: start;
                                }
                                .context-label {
                                    background-color: var(--granite-gray2);
                                    height: 50px;
                                    width: 500px;
                                    text-align: center;
                                    border-radius: 15px;
                                    margin: 12px 12px 0px 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    cursor: default;
                                }
                                .edit-row {
                                    height: 50px;
                                    margin-bottom: 20px;
                                    padding-left: 20px;
                                }
                                #second-row {
                                    display: flex;
                                    justify-content: space-between;
                                }
                                #add-text {
                                    margin: 16px 16px;
                                }
                                #third-row {
                                    display: flex;
                                    justify-content: space-between;
                                }
                                #refresh-order {
                                    float: right;
                                }
                                #refresh-searches {
                                    float: right;
                                }
                                #first-row {
                                    display: flex;
                                    justify-content: space-between;
                                }
                                .modify-button-text {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 150px;
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
                                .search-section {
                                    display: flex;
                                    flex-direction: column;
                                }
                                .search-box {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 1378px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    padding-left: 8px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    color: var(--white);
                                    font-family: var(--font-family-inter);
                                    font-size: var(--font-size-m);
                                    font-weight: 600;
                                    font-style: normal;
                                    cursor: text;
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
                                .table-text {
                                    width: 100%;
                                }
                                .table-button {
                                    width: 100%;
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
                                    <div id="first-row">
                                        <div>
                                            <button class="completed-text" onClick="location.assign(\'index.php?resource=order&action=newclient\')">Back</button>
                                        </div>
                                        <div class="context-label">
                                            <span class="side-bar-label-text">Enter the balloons needed for the order:</span>
                                        </div>
                                        <div>
                                            <button class="completed-text" onClick="location.assign(\'index.php?resource=order&action=items\')">Next</button>
                                        </div>
                                    </div>
                                    <div id="second-row" class="edit-row">
                                        <form method="post">
                                            <span class="side-bar-label-text" id="add-text">Add</span>
                                            <input class="modify-button-text" type="text" placeholder="number of" name="add-balloon-number" value="">
                                            <span class="side-bar-label-text">balloons, from row</span>
                                            <input class="modify-button-text" type="text" placeholder="row" name="add-balloon-row" value="">
                                            <button class="completed-text" type="submit" name="add">to order</button>
                                        </form>
                                        <form method="post">
                                            <button class="completed-text" id="refresh-order" name="refresh-order" type="submit">Restart Order</button>
                                        </form>
                                    </div>
                                    <div id="third-row" class="edit-row">
                                        <form method="post">
                                            <span class="side-bar-label-text">Remove</span>
                                            <input class="modify-button-text" type="text" placeholder="number of" name="add-balloon-number" value="">
                                            <span class="side-bar-label-text">balloons, from row</span>
                                            <input class="modify-button-text" type="text" placeholder="row" name="add-balloon-row" value="">
                                            <button class="completed-text" type="submit" name="delete">to order</button>
                                        </form>
                                    </div>
                                    <form class="search-section" method="post">
                                        <div>
                                            <button class="completed-text" id="refresh-searches" onClick="location.assign(\'index.php?resource=order&action=balloons\')">Refresh Search</button>
                                        </div>
                                        <div>
                                            <input class="search-box" type="text" name="searched" value="">
                                            <button class="completed-text" type="submit" name="search">Search</button>
                                        </div>
                                    </form>
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
                        </div>
                        </body>
                        </html>';

            echo $html;

        }
    }

?>