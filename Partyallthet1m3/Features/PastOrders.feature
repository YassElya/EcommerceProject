Feature: Set an Order as Past
In order to set an order as past
As a user
I must have done the order and sold it
    
  Scenario:
    Given I want to set the order as past
    Then I must have done the order first
    Then it will be considered as a past order
    Then it will be saved in the past orders table
