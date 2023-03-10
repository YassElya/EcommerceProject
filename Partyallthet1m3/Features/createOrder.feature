Feature: Create an order

  Scenario: user creating an order
    Given the user already logged in
    Then the user wants to create an order
    And the order exists in the inventory
    Then he can perform the operation of creating an order
