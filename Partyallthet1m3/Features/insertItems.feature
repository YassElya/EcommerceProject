Feature: Inserting Items

  Scenario: User inserts items in the inventory
    Given the user is already logged in
    When they get a new product
    Then they may insert it in the inventory
    And the item must be visible
    When they checks the stock
