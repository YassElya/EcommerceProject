Feature: Login/logout

  Scenario: user login
    Given User wants to login
    Then enters his username
    And enters his password
    When he clicks on login button
    Then gets redirected to the user home page

  Scenario: user logout
    Given User wants to logout
    When he is finished with the application
    Then he clicks on the logout button
    Then gets redirected to the user login page
    
  Scenario: Admin login
    Given Admin wants to login
    Then enters his username
    And enters his password
    When he clicks on login button
    Then gets redirected to the admin home page
    
  Scenario: Admin logout
    Given Admin wants to logout
    When admin is finished with the application
    Then he clicks on the logout button
    Then gets redirected to the admin login page
