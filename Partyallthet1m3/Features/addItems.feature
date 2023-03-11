Feature: Add Item into Inventory

  Scenario: User adds an item to the inventory
    Given the user wants to add an item
    Then they must login first
    Then they must fill in the form with the item's info
    When they click on the submit button it should send the item into the database
