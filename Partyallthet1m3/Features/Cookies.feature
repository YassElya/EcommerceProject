Feature: Add cookies to the application

    Scenario: The cookies store data
    Given the user or the admin uses the application
    Then the application creates the cookies
    Then the cookies store the data
    Then after some time they expire
