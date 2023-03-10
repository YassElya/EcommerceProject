Feature: inserting items

    Scenario: Admin inserts items in the inventory
    Given the admin is already logged in
    When he gets a new product
    Then he may insert it in the inventory
    And the item must be visible
    When he checks the stock
