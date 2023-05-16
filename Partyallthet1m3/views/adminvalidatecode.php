<?php

    namespace views;

    class AdminValidatecode {

        private $admin;

        function __construct($admin){

            $this->admin = $admin;

            if (isset($_POST['twofacode'])) {

                if ($this->admin->getOTPcodeisvalid())
                    header('Location: index.php?resource=order&action=list');
                else
                    echo 'Invalid 2FA code, please try again.';
            } else {

                $this->render();
        
            }
        }

        function render() {

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
                              img {
                                margin: 10px;
                                border-radius: 50%;
                                max-width: 95%;
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
                              }
                              .checkbox {
                                width: 40px;
                                height: 40px;
                                margin: 22px 12px 22px 12px;
                                cursor: pointer;
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
                          <title>Validate code</title>
                      </head>
                      
                      <body class="body">
                        <div class="entire-screen">
                          <div class="side-bar">
                            <div class="logo">
                                <img src="./assets/logo.png" alt="Avatar">
                            </div>
                            <div class="upper-buttons">
                              <div class="side-bar-labels">
                                  <span class="side-bar-label-text">Enter your 2FA Code</span>
                              </div>
                              </br></br>
                              <form action="" method="post">
                                <input class="modify-button-text" type="text" id="twofacode" name="twofacode">
                                <input class="side-bar-buttons-labels" type="submit" value="Submit">
                              </form>
                            </div>
                            <div class="login-section">
                              <button class="side-bar-buttons-labels" id="lower-button" onClick="location.assign(\'index.php?resource=admin&action=login\')">Back</button>
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