<?php

    namespace views;

    class AdminSetupTwofa {

        private $admin;

        function __construct($admin) {
            
            $this->admin = $admin;

            $this->render();

        }

        function render() {

            $qrcodeimageURL= \TokenAuth6238::getBarCodeUrl($this->admin->getUsername(), 'localhost', $this->admin->getOTPsecretkey(), 'Partyallthet1m3');

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
                                .side-bar-labels {
                                    background-color: var(--black);
                                    width: 225px;
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
                                .fa-section {
                                    display: flex;
                                    justify-content: space-between;
                                }
                                .fa-section-label {
                                    background-color: var(--black);
                                    width: 225px;
                                    border-radius: 15px;
                                    margin: 18px 12px 12px 12px;
                                    padding-left: 10px;
                                    vertical-align: middle;
                                    line-height: 50px;
                                    cursor: default;
                                }
                                #qr-code {
                                    margin: 30px;
                                }
                                .side-bar-buttons-labels {
                                    background-color: var(--black);
                                    height: 50px;
                                    width: 235px;
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
                                    cursor: pointer;
                                }
                                .modify-button-text {
                                    background-color: #454545;
                                    height: 50px;
                                    width: 235px;
                                    border-radius: 15px;
                                    padding-left: 12px;
                                    margin: 12px;
                                    vertical-align: middle;
                                    line-height: 50px;
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
                                }
                            </style>
                            <title>Set up twoFA</title>
                        </head>
                        
                        <body class="body">
                            <div class="entire-screen">
                            <div class="side-bar">
                                <div class="upper-buttons">
                                    <div class="side-bar-labels">
                                        <span class="side-bar-label-text">Download the Authenticator App</span>
                                    </div>
                                    </br>
                                    <div class="side-bar-labels">
                                        <a class="side-bar-label-text" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en_CA&gl=US&pli=1">Download on Google</a>
                                    </div>
                                    </br>
                                    <div class="side-bar-labels">
                                        <a class="side-bar-label-text" href="https://apps.apple.com/us/app/microsoft-authenticator/id983156458">Download on Apple</a>
                                    </div>
                                    <img id="qr-code" src='.$qrcodeimageURL.' alt=QR Code/>
                                </div>
                                <div class="login-section">
                                <button class="side-bar-buttons-labels" id="lower-button" onClick="location.assign(\'index.php?resource=admin&action=login\')">Login Here</button>
                                </div>
                            </div>
                            <div class="content">
                            </div>
                            </div>
                        </body>
                        </html>';

                echo $html;

        }
    }



?>