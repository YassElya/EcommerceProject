Feature: User register

  Scenario: user regiser
    Given User wants to register
    Then create his username
    And create his password
    When he clicks on register button
    Then gets redirected to the user login page
