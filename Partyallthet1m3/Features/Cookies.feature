Feature: Add Cookies to the Application

    Scenario: The cookies store data
    Given the user uses the application
    Then the application creates the cookies
    Then the cookies store the data
    Then after some time the cookies expire
