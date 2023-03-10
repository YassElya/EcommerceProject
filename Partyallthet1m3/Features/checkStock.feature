Feature: Check stock

  Scenario: Admin check his stock
    Given the admin is logged in
    And wants to check his stock
    Then he must click a button that redirects him to the page where the stock database will be displayed
