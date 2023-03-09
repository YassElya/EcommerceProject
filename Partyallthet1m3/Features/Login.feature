Feature: Login/logout

  Scenario: user login
    Given User wants to login
    Then enters his username
    And enters his password
    When he clicks on login button
    Then gets redirected to the home page

  Scenario: user logout
    Given User wants to logout
    When he is finished with the application
    Then he clicks on the logout button
    Then gets redirected to the login page