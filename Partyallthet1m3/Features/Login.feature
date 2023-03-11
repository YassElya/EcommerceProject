Feature: Login/Logout

  Scenario: user login
    Given User wants to login
    Then enters their username
    And enters their password
    When they click on the login button
    Then get redirected to the user home page

  Scenario: user logout
    Given User wants to logout
    When they are finished with the application
    Then they click on the logout button
    Then get redirected to the user login page
