Feature: Add item into inventory

  Scenario: Admin adds an item to the inventory
    Given the admin wants to add an item
    Then he must log in first
    Then he must fill in the form with the item's info
    When he clicks on the submit button it should send the item into the database
