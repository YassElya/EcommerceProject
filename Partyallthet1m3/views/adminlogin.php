<?php

  namespace views;

  class AdminLogin {

    private $admin;
    private $userMessage;

    function __construct($admin) {

      $this->admin = $admin;

      if ($this->admin->login()) {

        $this->admin->getMembershipProvider()->login();

        if ($this->admin->getEnabled2FA())
          header('Location: index.php?resource=admin&action=validatecode');
        else
          header('Location: index.php?resource=order&action=list');

      } else {

        $this->userMessage = '<div class="alert alert-danger" role="alert">
        You were not able to login, check your username and passowrd and try again.
        </div>';
        $this->render();

      }

    }

    function render() {

      if (($this->admin->getUsername() !== null) && ($this->admin->getPassword() !== null))
        echo $this->userMessage;

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
                          .side-bar-username-pasword-labels {
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
                      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
                  </head>
                  
                  <body class="body">
                    <div class="entire-screen">
                      <div class="side-bar">
                        <div class="logo">
                          <img src="./assets/logo.png" alt="Avatar">
                        </div>
                        <div class="upper-buttons">
                          <form action="" method="post">
                            <div class="side-bar-username-pasword-labels">
                              <span class="side-bar-label-text">Username</span>
                            </div>
                            <input class="modify-button-text" type="text" id="username" name="username"><br>
                            <div class="side-bar-username-pasword-labels">
                              <span class="side-bar-label-text">Password</span>
                            </div>
                            <input class="modify-button-text" type="password" id="password" name="password"><br><br>
                            <input class="side-bar-buttons-labels" type="submit" value="Login">
                          </form>
                        </div>
                        <div>
                          <button class="side-bar-buttons-labels" id="lower-button" onClick="location.assign(\'index.php?resource=admin&action=verify\')">Register Here</button>
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