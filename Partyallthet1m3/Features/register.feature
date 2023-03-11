Feature: User Register

  Scenario: User regiser
    Given user wants to register
    Then creates their username
    And creates their password
    When they click on register button
    Then get redirected to the user login page
