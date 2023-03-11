Feature: Internationalization and Localization

  Scenario: User wants to change the language
    Given the user is already logged in or not
    When they desire to change the language to the one they prefer
    Then they must select the language they wants
    Then the whole application must change to that language
