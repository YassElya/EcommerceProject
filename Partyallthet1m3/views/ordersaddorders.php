<?php
    
    namespace views;

    class OrdersAddorders {

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
            $items = $data[3];

            $balloonsToAdd = array();

            if (isset($_POST['search'])) {

                $fullBalloon = new \models\Balloon();
                $balloons = $fullBalloon->searchBalloons($_POST['searched']);

                //array_push($balloonsToAdd, "apple", "raspberry");
            }

            if (isset($_POST['modify'])) {

                /*if (isset($_POST['remove-balloons'])) {

                    $id = $_POST['remove-balloons'];

                    var_dump($id);

                }*/


                foreach ($balloons as $b) {

                    if (isset($_POST[''. $b['balloon_id'].'']) && !empty($_POST[''. $b['balloon_id'].''])) {

                        $id = $b['balloon_id'];
    
                        var_dump($id);
    
                    }

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
                                    width: 1000px;
                                    border-radius: 15px;
                                    margin: 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                }
                                .second-row {
                                    display: flex;
                                    justify-content: space-between;
                                }
                                .third-row {
                                    display: flex;
                                    justify-content: space-between;
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
                                    width: 1350px;
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
                                    margin-bottom: 150px;
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
                                    <div id="balloons">
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
                                        <div class="second-row edit-row">
                                            <form method="post">
                                                <span class="side-bar-label-text">Add</span>
                                                <input class="modify-button-text" type="text" placeholder="number of" name="add-balloon-number" value="">
                                                <span class="side-bar-label-text">balloons, from row</span>
                                                <input class="modify-button-text" type="text" placeholder="number" name="add-balloon-row" value="">
                                                <button class="completed-text" type="submit" name="delete">to order</button>
                                            </form>
                                        </div>
                                        <div class="third-row edit-row">
                                            <form method="post">
                                                <span class="side-bar-label-text">Remove</span>
                                                <input class="modify-button-text" type="text" placeholder="number of" name="add-balloon-number" value="">
                                                <span class="side-bar-label-text">balloons, from row</span>
                                                <input class="modify-button-text" type="text" placeholder="number" name="add-balloon-row" value="">
                                                <button class="completed-text" type="submit" name="delete">to order</button>
                                            </form>
                                        </div>
                                        <div>
                                            <button class="completed-text" id="refresh-searches" onClick="location.assign(\'index.php?resource=order&action=balloons\')">Refresh Search</button>
                                        </div>
                                        <form class="search-section" method="post">
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
                        <div id="items">
                            <div id="first-row">
                                <div class="context-label" >
                                    <span class="side-bar-label-text">Enter the items needed for the order:</span>
                                </div>
                            </div>
                            <div class="second-row edit-row">
                                <div>
                                    <form method="post">
                                        <span class="side-bar-label-text">Add</span>
                                        <input class="modify-button-text" type="text" placeholder="number of" name="add-item-number" value="">
                                        <span class="side-bar-label-text">items, from row</span>
                                        <input class="modify-button-text" type="text" placeholder="number" name="add-item-row" value="">
                                        <button class="completed-text" type="submit" name="delete">to order</button>
                                    </form>
                                </div>
                            </div>
                            <div class="third-row edit-row">
                                <form method="post">
                                    <span class="side-bar-label-text">Remove</span>
                                    <input class="modify-button-text" type="text" placeholder="number of" name="add-item-number" value="">
                                    <span class="side-bar-label-text">items, from row</span>
                                    <input class="modify-button-text" type="text" placeholder="number" name="add-item-row" value="">
                                    <button class="completed-text" type="submit" name="delete">to order</button>
                                </form>
                            </div>
                            <div>
                                <button class="completed-text" id="refresh-searches" onClick="location.assign(\'index.php?resource=order&action=addorders\')">Refresh Search</button>
                            </div>
                            <form class="search-section" method="post">
                                <div>
                                    <input class="search-box" type="text" name="searched" value="">
                                    <button class="completed-text" type="submit" name="search">Search</button>
                                </div>
                            </form>
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